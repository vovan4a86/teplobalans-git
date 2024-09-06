<?php

use App\Http\Controllers\AjaxController;

Route::get('robots.txt', 'PageController@robots')->name('robots');

Route::group(
    ['prefix' => 'ajax', 'as' => 'ajax.'],
    function () {
        Route::post('request', 'AjaxController@postSendRequest')->name('request');
        Route::post('vacancy', 'AjaxController@postSendVacancy')->name('vacancy');
        Route::post('project', 'AjaxController@postSendProject')->name('project');
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
        Route::any('contacts', ['as' => 'contacts', 'uses' => 'PageController@contacts']);
        Route::any('about/projects', ['as' => 'projects', 'uses' => 'ObjectsController@index']);
        Route::any('about/projects/{id}', ['as' => 'projects.item', 'uses' => 'ObjectsController@item']);
        Route::any('about/portfolio', ['as' => 'portfolio', 'uses' => 'PageController@portfolio']);
        Route::any('about/vacancies', ['as' => 'vacancies', 'uses' => 'VacanciesController@index']);
        Route::any('about/vacancies/{id}', ['as' => 'vacancies.item', 'uses' => 'VacanciesController@item']);

        Route::any('price', ['as' => 'price', 'uses' => 'PageController@price']);
        Route::any('contacts', ['as' => 'contacts', 'uses' => 'PageController@contacts']);

        Route::any('policy', ['as' => 'policy', 'uses' => 'PageController@policy']);
        Route::any('agreement', ['as' => 'agreement', 'uses' => 'PageController@agreement']);

        Route::any('{alias}', ['as' => 'default', 'uses' => 'PageController@page'])
            ->where('alias', '([A-Za-z0-9\-\/_]+)');
    }
);
