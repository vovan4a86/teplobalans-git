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
    ['middleware' => []],
    function () {
        Route::get('/', ['as' => 'main', 'uses' => 'WelcomeController@index']);

        Route::any('services', ['as' => 'services', 'uses' => 'ServicesController@index']);
        Route::any('services/{alias}', ['as' => 'services.item', 'uses' => 'ServicesController@item'])
            ->where('alias', '([A-Za-z0-9\-\/_]+)');

        Route::any('about', ['as' => 'about', 'uses' => 'PageController@about']);
        Route::any('about/contacts', ['as' => 'contacts', 'uses' => 'PageController@contacts']);
        Route::any('about/projects', ['as' => 'projects', 'uses' => 'ObjectsController@index']);
        Route::any('about/projects/{id}', ['as' => 'projects.item', 'uses' => 'ObjectsController@item']);

        Route::any('price', ['as' => 'price', 'uses' => 'PageController@price']);
        Route::any('contacts', ['as' => 'contacts', 'uses' => 'PageController@contacts']);

        Route::any('policy', ['as' => 'policy', 'uses' => 'PageController@policy']);
        Route::any('agreement', ['as' => 'agreement', 'uses' => 'PageController@agreement']);

        Route::any('{alias}', ['as' => 'default', 'uses' => 'PageController@page'])
            ->where('alias', '([A-Za-z0-9\-\/_]+)');
    }
);
