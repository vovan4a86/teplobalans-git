<?php

namespace App\Http\Controllers;

use Fanky\Admin\Models\Catalog;
use Fanky\Admin\Models\Certificate;
use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\Product;
use Fanky\Admin\Models\SearchIndex;
use Fanky\Auth\Auth;
use SEOMeta;
use Request;
use Settings;
use View;
use S;

class CatalogController extends Controller
{
    public function index()
    {
        $page = Page::getByPath(['catalog']);
        if (!$page) {
            return abort(404);
        }

        $bread = $page->getBread();
        $page->h1 = $page->getH1();
        $page->setSeo();
        $page = $this->add_region_seo($page);

        $main_catalog = Catalog::public()->whereParentId(0)->orderBy('order')->get();

        return view(
            'catalog.index',
            [
                'h1' => $page->getH1(),
                'text' => $page->text,
                'bread' => $bread,
                'main_catalog' => $main_catalog,
            ]
        );
    }

    public function view($alias)
    {
        $path = explode('/', $alias);
        /* проверка на продукт в категории */
        $product = null;
        $end = array_pop($path);
        $category = Catalog::getByPath($path);
        if ($category && $category->published) {
            $product = Product::whereAlias($end)
                ->public()
                ->whereCatalogId($category->id)
                ->first();
        }
        if ($product) {
            return $this->product($product);
        } else {
            array_push($path, $end);

            return $this->category($path + [$end]);
        }
    }

    public function category($path)
    {
        $category = Catalog::getByPath($path);
        if (!$category || !$category->published) {
            abort(404, 'Страница не найдена');
        }

        $bread = $category->getBread();
        $category->load('public_children');
        $category->generateTitle();
        $category->generateDescription();
        $category = $this->add_region_seo($category);
        $category->setSeo();
        $category->ogGenerate();


        Auth::init();
        if (Auth::user() && Auth::user()->isAdmin) {
            View::share('admin_edit_link', route('admin.catalog.catalogEdit', [$category->id]));
        }

        if($category->public_children()->count()) {
            $view = 'catalog.sub_category';
            $certificates = [];
        } else {
            $view = 'catalog.category';
            $certificates = Certificate::orderBy('order')->get();
        }

        $products = $category->products()->paginate(S::get('products_per_page', 12));

        if (request()->ajax()) {
            //загрузить еще
            $view_items = [];
            foreach ($products as $item) {
                $view_items[] = view('catalog.product_item', ['item' => $item,])->render();
            }

            $btn_paginate = null;
            if ($products->nextPageUrl()) {
                $btn_paginate = view('paginations.load_more', ['paginator' => $products])->render();
            }

            $paginate = view('paginations.with_pages', ['paginator' => $products])->render();

            return [
                'items' => $view_items,
                'btn' => $btn_paginate,
                'paginate' => $paginate,
            ];
        }

        $data = [
            'bread' => $bread,
            'category' => $category,
            'h1' => $category->getH1(),
            'text' => $category->text,
            'products' => $products,
            'certificates' => $certificates
        ];

        return view($view, $data);
    }

    public function product(Product $product)
    {
        $bread = $product->getBread();
        $product->generateTitle();
        $product->generateDescription();
        if (!$product->announce) {
            $product->generateAnnounce();
        }
        if (!$product->text) {
            $product->generateText();
        }

        $product = $this->add_region_seo($product);
        $product->setSeo();
        $product->ogGenerate();

        if (count($product->images) == 0) {
            $images = $product->catalog->single_image()->thumb(3);
        } else {
            $images = $product->images;
        }

        Auth::init();
        if (Auth::user() && Auth::user()->isAdmin) {
            View::share('admin_edit_link', route('admin.catalog.productEdit', $product->id));
        }

        //последние просмотренные товары
        $viewed_ids = session()->get('products_viewed', []);
        if (!in_array($product->id, $viewed_ids)) {
            //max число показываемых товаров
            if (count($viewed_ids) >= Settings::get('product_max_viewed', 3)) {
                array_shift($viewed_ids);
            }
            array_push($viewed_ids, $product->id);
            session()->put('products_viewed', $viewed_ids);
        }

        $viewed = [];
        if ($viewed_ids = session()->get('products_viewed')) {
            foreach (array_reverse($viewed_ids) as $id) {
                $viewed[] = Product::find($id);
            }
        }

        $related = Product::where('catalog_id', $product->catalog_id)
                    ->where('id', '!=', $product->id)
                    ->inRandomOrder()
                    ->limit(S::get('related_per_page', 6))
                    ->get();

        return view(
            'catalog.product',
            [
                'product' => $product,
                'h1' => $product->getH1(),
                'bread' => $bread,
                'text' => $product->text,
                'announce' => $product->announce,
                'images' => $images,
                'related' => $related,
                'viewed' => $viewed,
            ]
        );
    }

    public function search()
    {
        $bread[] = [
            'name' => 'Поиск',
            'url' => route('search')
        ];

        if (!$s = Request::get('s', '')) {
            $items_ids = [];
        } else {
            $items_ids = SearchIndex::orWhere('name', 'LIKE', '%' . $s . '%')
                ->pluck('product_id')->all();
        }
        $items = Product::whereIn('id', $items_ids)
            ->paginate(S::get('search_per_page', 12))
            ->appends(['s' => $s]); //Добавить параметры в строку запроса можно через метод appends().


        SEOMeta::setTitle('Результат поиска «' . $s . '»');
        \View::share('canonical', route('search'));

        if (request()->ajax()) {
            //загрузить еще
            $view_items = [];
            foreach ($items as $item) {
                $view_items[] = view('catalog.product_item', ['item' => $item,])->render();
            }

            $btn_paginate = null;
            if ($items->nextPageUrl()) {
                $btn_paginate = view('paginations.load_more', ['paginator' => $items])->render();
            }

            $paginate = view('paginations.with_pages', ['paginator' => $items])->render();

            return [
                'items' => $view_items,
                'btn' => $btn_paginate,
                'paginate' => $paginate
            ];
        }


        $title = 'Результат поиска «' . $s . '»';
        $certificates = Certificate::orderBy('order')->get();

        return view('search.index', [
            'bread' => $bread,
            'items' => $items,
            'h1' => $title,
            'certificates' => $certificates
        ]);
    }
}
