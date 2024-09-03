<?php
namespace App\Http\Controllers;

use App;
use App\Classes\SiteHelper;
use Fanky\Admin\Models\News;
use Fanky\Admin\Models\Page;
use Fanky\Auth\Auth;
use S;
use Settings;
use View;

class NewsController extends Controller
{
    public $bread = [];
    protected $news_page;

    public function __construct()
    {
        $this->news_page = Page::whereAlias('news')
            ->get()
            ->first();
    }

    public function index()
    {
        $page = $this->news_page;
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $this->news_page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        $items = News::public()->orderBy('date', 'desc')
            ->paginate(Settings::get('news_per_page', 5));

        //обработка ajax-обращений, в routes добавить POST метод(!)
        if (request()->ajax()) {
            $view_items = [];
            foreach ($items as $item) {
                //добавляем новые элементы
                $view_items[] = view(
                    'news.newses_item',
                    [
                        'item' => $item,
                    ]
                )->render();
            }

            $btn_paginate = null;
            if ($items->nextPageUrl()) {
                $btn_paginate = view('paginations.more_news', ['paginator' => $items])->render();
            }

            return [
                'items' => $view_items,
                'btn' => $btn_paginate,
            ];
        }

        return view(
            'news.index',
            [
                'title' => $page->title,
                'text' => $page->text,
                'h1' => $page->getH1(),
                'bread' => $bread,
                'news' => $items,
            ]
        );
    }

    public function item($alias)
    {
        $item = News::whereAlias($alias)->public()->first();
        if (!$item) {
            abort(404);
        }

        $bread = $this->news_page->getBread();
        $bread[] = [
            'url' => $item->url,
            'name' => $item->name
        ];

        Auth::init();
        if (Auth::user() && Auth::user()->isAdmin) {
            View::share('admin_edit_link', route('admin.news.edit', $item->id));
        }

        $item->setSeo();
        $item->ogGenerate();

        $images = $item->images;
        $read_more = News::public()->orderByDesc('date')
            ->where('id', '!=', $item->id)
            ->limit(S::get('read_more_per_page', 6))->get();

        return view(
            'news.item',
            [
                'item' => $item,
                'h1' => $item->name,
                'text' => $item->text,
                'bread' => $bread,
                'images' => $images,
                'read_more' => $read_more
            ]
        );
    }
}
