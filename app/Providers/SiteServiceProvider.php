<?php

namespace App\Providers;

use Cache;
use DB;
use Fanky\Admin\Models\Catalog;
use Fanky\Admin\Models\City;
use Fanky\Admin\Settings;
use Illuminate\Support\ServiceProvider;
use View;
use Fanky\Admin\Models\Page;

class SiteServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['template'],
            function (\Illuminate\View\View $view) {
                $header_menu = Cache::get('header_menu', collect());
                if (!count($header_menu)) {
                    $header_menu = Page::query()
                        ->public()
                        ->where('parent_id', 1)
                        ->where('on_header', 1)
                        ->orderBy('order')
                        ->get();
                    Cache::add('header_menu', $header_menu, now()->addMinutes(60));
                }

                $services_links = Cache::get('services_links', collect());
                if (!count($services_links)) {
                    $services_links = Catalog::query()
                        ->public()
                        ->where('parent_id', 0)
                        ->orderBy('order')
                        ->get();
                    Cache::add('services_links', $services_links, now()->addMinutes(60));
                }

                $footer_menu = Cache::get('footer_menu', collect());
                if (!count($footer_menu)) {
                    $footer_menu = Page::query()
                        ->public()
                        ->where('parent_id', 1)
                        ->where('on_footer', 1)
                        ->orderBy('order')
                        ->get();
                    Cache::add('footer_menu', $footer_menu, now()->addMinutes(60));
                }

                $view->with(
                    compact(
                        [
                            'header_menu',
                            'services_links',
                            'footer_menu'
                        ]
                    )
                );
            }
        );

        View::composer(
            ['errors.404'],
            function () {
                \SEO::setTitle('Страница не найдена');
            }
        );

        View::composer(
            ['errors.500'],
            function () {
                \SEO::setTitle('Проблемы с сервером');
            }
        );
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'settings',
            function () {
                return new \App\Classes\Settings();
            }
        );
        $this->app->bind(
            'sitehelper',
            function () {
                return new \App\Classes\SiteHelper();
            }
        );
        $this->app->alias('settings', \App\Facades\Settings::class);
        $this->app->alias('sitehelper', \App\Facades\SiteHelper::class);
    }
}
