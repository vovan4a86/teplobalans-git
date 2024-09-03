<?php
namespace App\Http\Controllers;

use App;
use App\Classes\SiteHelper;
use Fanky\Admin\Models\News;
use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\Project;
use Fanky\Auth\Auth;
use Settings;
use View;

class ObjectsController extends Controller
{
    public $bread = [];
    protected $projects_page;

    public function __construct()
    {
        $this->projects_page = Page::whereAlias('objects')
            ->get()
            ->first();
    }

    public function index()
    {
        $page = $this->projects_page;
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $this->projects_page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        $projects = Project::orderBy('order')
            ->public()->paginate(Settings::get('projects_per_page', 8));

        if (count(request()->query())) {
            View::share('canonical', route('projects'));
        }

        //обработка ajax-обращений, в routes добавить POST метод(!)
        if (request()->ajax()) {
            $view_items = [];
            foreach ($projects as $item) {
                //добавляем новые элементы
                $view_items[] = view(
                    'projects.project_item',
                    [
                        'item' => $item,
                    ]
                )->render();
            }

            $btn_paginate = null;
            if ($projects->nextPageUrl()) {
                $btn_paginate = view('paginations.more_projects', ['paginator' => $projects])->render();
            }

            return [
                'items' => $view_items,
                'btn' => $btn_paginate,
            ];
        }

        return view(
            'projects.index',
            [
                'title' => $page->title,
                'text' => $page->text,
                'h1' => $page->getH1(),
                'bread' => $bread,
                'projects' => $projects,
            ]
        );
    }
}
