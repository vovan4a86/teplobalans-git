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
                if(count($section->items)) {
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
                } else {
                    $all_tabs[$section->name] = [];
                }
            }
            Cache::add('all_tabs', $all_tabs, now()->addMinutes(60));
        }

//        dd($all_tabs);

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

    public function portfolio()
    {
        $page = Page::whereAlias('portfolio')->first();
        if (!$page) {
            abort(404, 'Страница не найдена');
        }

        $bread[] = [
            'url'  => route('about'),
            'name' => 'О компании'
        ];

        $bread[] = [
            'url'  => route('portfolio'),
            'name' => 'Наши объекты'
        ];
        $page->ogGenerate();
        $page->setSeo();

        if (count(request()->query())) {
            View::share('canonical', route('portfolio'));
        }

        $gallery = Gallery::whereCode('portfolio')->first();
        $images = $gallery->items()->paginate(S::get('portfolio_per_page', 9));

        return view('pages.portfolio', [
            'bread' => $bread,
            'h1' => $page->getH1(),
            'page' => $page,
            'images' => $images
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
