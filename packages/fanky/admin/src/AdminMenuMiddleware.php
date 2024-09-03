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

                $menu->add('Каталог', ['route' => 'admin.catalog', 'icon' => 'fa-list'])
                    ->active('/admin/catalog/*');

                $menu->add('Новости', ['route' => 'admin.news', 'icon' => 'fa-calendar'])
                    ->active('/admin/news/*');

                $menu->add('Проекты', ['route' => 'admin.projects', 'icon' => 'fa-handshake-o'])
                    ->active('/admin/projects/*');

                $menu->add('Вакансии', ['route' => 'admin.vacancies', 'icon' => 'fa-vcard-o'])
                    ->active('/admin/vacancies/*');

                $menu->add('Сертификаты', ['route' => 'admin.certificates', 'icon' => 'fa-certificate'])
                    ->active('/admin/certificates/*');

                $menu->add('Производство', ['route' => 'admin.services', 'icon' => 'fa-magic'])
                    ->active('/admin/services/*');

//                $menu->add('Заказы', ['route' => 'admin.orders', 'icon' => 'fa-dollar'])
//                    ->active('/admin/orders/*');

                $menu->add('Региональность', ['route' => 'admin.cities', 'icon' => 'fa-globe'])
                    ->active('/admin/cities/*');

                $menu->add('Настройки', ['icon' => 'fa-cogs'])
                    ->nickname('settings');
                $menu->settings->add('Настройки', ['route' => 'admin.settings', 'icon' => 'fa-gear'])
                    ->active('/admin/settings/*');
            }
        );

        return $next($request);
    }

}
