<?php
namespace App\Http\Controllers;

use App;
use Cache;
use Fanky\Admin\Models\Certificate;
use Fanky\Admin\Models\City;
use Fanky\Admin\Models\Gallery;
use Fanky\Admin\Models\News;
use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\PriceSection;
use Fanky\Admin\Models\Product;
use Fanky\Admin\Models\Project;
use Fanky\Admin\Models\SearchIndex;
use Fanky\Admin\Models\Vacancy;
use Fanky\Auth\Auth;
use Illuminate\Http\Response;
use Request;
use S;
use SiteHelper;
use View;

class PageController extends Controller
{

    public function page($alias = null): Response
    {
        $path = explode('/', $alias);
        if (!$alias) {
            $current_city = SiteHelper::getCurrentCity();
            $this->city = $current_city && $current_city->id ? $current_city : null;
            $page = $this->city->generateIndexPage();
        } else {
            $page = Page::getByPath($path);
            if (!$page) {
                abort(404, 'Страница не найдена');
            }
        }

        $bread = $page->getBread();
        $page->h1 = $page->getH1();
        $view = $page->getView();
        $page->ogGenerate();
        $page->setSeo();

        Auth::init();
        if (Auth::user() && Auth::user()->isAdmin) {
            View::share('admin_edit_link', route('admin.pages.edit', [$page->id]));
        }

        return response()->view($view, [
            'page' => $page,
            'h1' => $page->h1,
            'text' => $page->text,
            'title' => $page->title,
            'bread' => $bread
        ]);
    }

    public function about()
    {
        $page = Page::whereAlias('about')->first();
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        $clients = S::get('about_clients', []);
        $projects = S::get('about_projects', []);
        $foto_gallery = Gallery::whereCode('about_foto')->first();
        $fotos = $foto_gallery->items;
        $licenses_gallery = Gallery::whereCode('about_licenses')->first();
        $licenses = $licenses_gallery->items;


        return view('pages.about', [
            'bread' => $bread,
            'page' => $page,
            'h1' => $page->getH1(),
            'clients' => $clients,
            'projects' => $projects,
            'fotos' => $fotos,
            'licenses' => $licenses,
        ]);
    }

    public function price()
    {
        $page = Page::whereAlias('price')->first();
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        $sections = PriceSection::query()
            ->with(['items'])
            ->orderBy('order')->get();



        $all_tabs = Cache::get('all_tabs', collect());
        if (!count($all_tabs)) {
            $all_tabs = [];
            //формируем таблицы с заголовками и без
            //заголовок = name без цены
            foreach ($sections as $section) {
                $new_section = '';
                foreach ($section->items as $i => $elem) {
                    if($elem->price == '') {
                        $new_section = $elem->name;
                    }
                    if($new_section !== $elem->name) {
                        $all_tabs[$section->name][$new_section][] = [
                            'name' => $elem->name,
                            'price' => $elem->price
                        ];
                    }
                }
            }

            Cache::add('all_tabs', $all_tabs, now()->addMinutes(60));
        }

        return view('pages.price', [
            'bread' => $bread,
            'h1' => $page->getH1(),
            'all_tabs' => $all_tabs
        ]);
    }

    public function contacts()
    {
        $page = Page::whereAlias('contacts')->first();
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        $contacts = S::get('contacts_list', []);

        return view('pages.contacts', [
            'page' => $page,
            'text' => $page->text,
            'h1' => $page->getH1(),
            'bread' => $bread,
            'contacts' => $contacts
        ]);
    }

    public function policy()
    {
        $page = Page::whereAlias('policy')->first();
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        return view('pages.text', [
            'page' => $page,
            'text' => $page->text,
            'h1' => $page->getH1(),
            'bread' => $bread
        ]);
    }

    public function agreement()
    {
        $page = Page::whereAlias('user_agreement')->first();
        if (!$page) {
            abort(404, 'Страница не найдена');
        }
        $bread = $page->getBread();
        $page->ogGenerate();
        $page->setSeo();

        return view('pages.text', [
            'page' => $page,
            'text' => $page->text,
            'h1' => $page->getH1(),
            'bread' => $bread
        ]);
    }

    public function search()
    {
        \View::share('canonical', route('search'));
        $q = Request::get('q', '');

        if (!$q) {
            $items_ids = [];
        } else {
            $items_ids = SearchIndex::orWhere('name', 'LIKE', '%' . $q . '%')
                ->orderByDesc('updated_at')
                ->pluck('product_id')->all();
        }
        $items = Product::whereIn('id', $items_ids)
            ->paginate(S::get('search_per_page', 12))
            ->appends(['q' => $q]); //Добавить параметры в строку запроса можно через метод appends().

        if (Request::ajax()) {
            $view_items = [];
            foreach ($items as $item) {
                $view_items[] = view('catalog.product_item', [
                    'item' => $item,
                ])->render();
            }

            return response()->json([
                'items' => $view_items,
                'paginate' => view('paginations.with_pages', [
                    'paginator' => $items
                ])->render()
            ]);
        }

        $bread = [
            'name' => 'Поиск',
            'url' => route('search')
        ];
        $title = 'Результат поиска «' . $q . '»';
        $certificates = Certificate::orderBy('order')->get();

        return view('search.index', [
            'bread' => $bread,
            'items' => $items,
            'h1' => $title,
            'certificates' => $certificates
        ]);
    }

    public function robots()
    {
        $robots = new App\Robots();
        if (App::isLocal()) {
            $robots->addUserAgent('*');
            $robots->addDisallow('/');
        } else {
            $robots->addUserAgent('*');
            $robots->addDisallow('/admin');
            $robots->addDisallow('/ajax');
        }

        $robots->addHost(config('app.url'));
        $robots->addSitemap(secure_url('sitemap.xml'));

        $response = response($robots->generate())
            ->header('Content-Type', 'text/plain; charset=UTF-8');
        $response->header('Content-Length', strlen($response->getOriginalContent()));

        return $response;
    }
}
