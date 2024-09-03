<?php namespace App\Http\Controllers;

use Fanky\Admin\Models\Catalog;
use Fanky\Admin\Models\City;
use Fanky\Admin\Models\News;
use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\Product;
use Fanky\Admin\Models\Review;
use Fanky\Admin\Settings;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use S;

class WelcomeController extends Controller {

    public function index(): Response
    {
        $page = Page::find(1);
        $page->ogGenerate();
        $page->setSeo();

        $main_catalog = Cache::get('catalog_on_main', collect());
        if (!count($main_catalog)) {
            $main_catalog = Catalog::query()
                ->public()
                ->onMain()
                ->orderBy('order')
                ->get();
            Cache::add('catalog_on_main', $main_catalog, now()->addMinutes(60));
        }

        $main_slider = S::get('main_slider', []);

        return response()->view('pages.index', [
            'page' => $page,
            'text' => $page->text,
            'h1' => $page->getH1(),
            'main_slider' => $main_slider,
        ]);
    }
}
