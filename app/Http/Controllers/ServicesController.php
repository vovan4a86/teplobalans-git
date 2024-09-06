<?php
namespace App\Http\Controllers;

use App;
use App\Classes\SiteHelper;
use Fanky\Admin\Models\Catalog;
use Fanky\Admin\Models\News;
use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\Service;
use Fanky\Auth\Auth;
use Settings;
use View;

class ServicesController extends Controller
{
    public $bread = [];
    protected $services_page;

    public function __construct()
    {
        $this->services_page = Page::whereAlias('services')
            ->get()
            ->first();
    }

    public function index()
    {
        $page = $this->services_page;
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $this->services_page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        $services = Catalog::public()->orderBy('order')->get();

        return view(
            'services.index',
            [
                'h1' => $page->getH1(),
                'bread' => $bread,
                'services' => $services
            ]
        );
    }

    public function item($alias)
    {
        $item = Catalog::whereAlias($alias)->public()->first();
        if (!$item) {
            abort(404);
        }

        $bread = $this->bread;
        $bread[] = [
            'url' => $item->url,
            'name' => $item->name
        ];

        Auth::init();
        if (Auth::user() && Auth::user()->isAdmin) {
            View::share('admin_edit_link', route('admin.catalog.catalogEdit', [$item->id]));
        }

        $item->setSeo();
        $item->ogGenerate();

        return view(
            'services.item',
            [
                'bread' => $bread,
                'item' => $item,
                'h1' => $item->getH1(),
                'text_title' => $item->text_title,
                'text' => $item->text,
            ]
        );
    }
}
