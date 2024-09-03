<?php

use App\Http\Controllers\AjaxController;

Route::get('robots.txt', 'PageController@robots')->name('robots');

Route::group(
    ['prefix' => 'ajax', 'as' => 'ajax.'],
    function () {
        Route::post('drawing-request', 'AjaxController@postSendDrawingRequest')->name('drawing-request');
        Route::post('consultation', 'AjaxController@postSendConsultation')->name('consultation');
        Route::post('product-request', 'AjaxController@postSendProductRequest')->name('product-request');

        Route::post('change-city/{id?}', 'AjaxController@postChangeCity')->name('change-city');
        Route::post('set-default-city', 'AjaxController@postSetDefaultCity')->name('set-default-city');
        Route::post('get-correct-region-link', 'AjaxController@postGetCorrectRegionLink')->name('get-correct-region-link');
    }
);

Route::group(
    ['middleware' => ['redirects', 'regions']],
    function () {
        $cities = getCityAliases();
        $cities = implode('|', $cities);
        Route::group(
            [
                'prefix' => '{city}',
                'as' => 'region.',
                'where' => ['city' => $cities]
            ],
            function () use ($cities) {
                Route::get('/', ['as' => 'index', 'uses' => 'PageController@page']);
                Route::group(
                    ['prefix' => 'catalog', 'as' => 'catalog.'],
                    function () {
                        Route::any('/', ['as' => 'index', 'uses' => 'CatalogController@index']);
                        Route::any('{alias}', ['as' => 'view', 'uses' => 'CatalogController@view'])
                            ->where('alias', '([A-Za-z0-9\-\/_]+)');
                    }
                );

                Route::any('{alias}', ['as' => 'pages', 'uses' => 'PageController@region_page'])
                    ->where('alias', '([A-Za-z0-9\-\/_]+)');
            }
        );

        Route::get('/', ['as' => 'main', 'uses' => 'WelcomeController@index']);

        Route::any('news', ['as' => 'news', 'uses' => 'NewsController@index']);
        Route::any('news/{alias}', ['as' => 'news.item', 'uses' => 'NewsController@item']);

        Route::any('services', ['as' => 'services', 'uses' => 'ServicesController@index']);

        Route::any('about', ['as' => 'about', 'uses' => 'PageController@about']);
        Route::any('about/contacts', ['as' => 'contacts', 'uses' => 'PageController@contacts']);
        Route::any('about/projects', ['as' => 'projects', 'uses' => 'ObjectsController@index']);
        Route::any('about/projects/{id}', ['as' => 'projects.item', 'uses' => 'ObjectsController@item']);

        Route::any('policy', ['as' => 'policy', 'uses' => 'PageController@policy']);
        Route::any('agreement', ['as' => 'agreement', 'uses' => 'PageController@agreement']);

        Route::any('catalog', ['as' => 'catalog', 'uses' => 'CatalogController@index']);
        Route::any('catalog/landing/opori-osveshcheniya-i-svetilniki-iz-alyuminiya',
            ['as' => 'catalog.opory', 'uses' => 'PageController@opory'])
            ->where('alias', '([A-Za-z0-9\-\/_]+)');
        Route::any('catalog/{alias}', ['as' => 'catalog.view', 'uses' => 'CatalogController@view'])
            ->where('alias', '([A-Za-z0-9\-\/_]+)');

        Route::any('search', ['as' => 'search', 'uses' => 'CatalogController@search']);

        Route::any('{alias}', ['as' => 'default', 'uses' => 'PageController@page'])
            ->where('alias', '([A-Za-z0-9\-\/_]+)');
    }
);
