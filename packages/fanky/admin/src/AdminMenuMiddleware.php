<?php

namespace Fanky\Admin;

use Closure;
use Illuminate\Http\Request;
use Lavary\Menu\Builder;
use Menu;

class AdminMenuMiddleware
{

    /**
     * Run the request filter.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Menu::make(
            'main_menu',
            function (Builder $menu) use ($request) {
                $menu->add('Структура сайта', ['route' => 'admin.pages', 'icon' => 'fa-sitemap'])
                    ->active('/admin/pages/*');

                $menu->add('Услуги', ['route' => 'admin.catalog', 'icon' => 'fa-list'])
                    ->active('/admin/catalog/*');

                $menu->add('Прайс', ['route' => 'admin.prices', 'icon' => 'fa-money'])
                    ->active('/admin/prices/*');

//                $menu->add('Проекты', ['route' => 'admin.projects', 'icon' => 'fa-handshake-o'])
//                    ->active('/admin/projects/*');

                $menu->add('Вакансии', ['route' => 'admin.vacancies', 'icon' => 'fa-vcard-o'])
                    ->active('/admin/vacancies/*');

                $menu->add('Настройки', ['icon' => 'fa-cogs'])
                    ->nickname('settings');
                $menu->settings->add('Настройки', ['route' => 'admin.settings', 'icon' => 'fa-gear'])
                    ->active('/admin/settings/*');
            }
        );

        return $next($request);
    }

}
