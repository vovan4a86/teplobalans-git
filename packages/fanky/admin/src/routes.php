<?php

use Fanky\Admin\Controllers\AdminCatalogController;
use Fanky\Admin\Controllers\AdminController;

Route::group(['namespace' => 'Fanky\Admin\Controllers', 'prefix' => 'admin', 'as' => 'admin'], function () {
	Route::any('/', ['uses' => 'AdminController@main']);
    Route::post('clear-cache', [AdminController::class, 'postClearCache'])->name('.clear-cache');
    Route::post('update-search-index', [AdminController::class, 'postUpdateSearchIndex'])->name('.update-search-index');

	Route::group(['as' => '.pages', 'prefix' => 'pages'], function () {
		$controller  = 'AdminPagesController@';
		Route::get('/', $controller . 'getIndex');
		Route::get('edit/{id?}', $controller . 'getEdit')
			->name('.edit');

		Route::post('edit/{id?}', $controller . 'postEdit')
			->name('.edit');

		Route::get('get-pages/{id?}', $controller . 'getGetPages')
			->name('.get_pages');

		Route::post('save', $controller . 'postSave')
			->name('.save');

		Route::post('reorder', $controller . 'postReorder')
			->name('.reorder');

		Route::post('delete/{id}', $controller . 'postDelete')
			->name('.del');

        Route::post('delete-image/{id}', $controller . 'postDeleteImage')
            ->name('.delete-image');

		Route::get('filemanager', [
			'as'   => '.filemanager',
			'uses' => $controller . 'getFileManager'
		]);

		Route::get('imagemanager', [
			'as'   => '.imagemanager',
			'uses' => $controller . 'getImageManager'
		]);
	});

	Route::group(['as' => '.catalog', 'prefix' => 'catalog'], function () {
		$controller  = 'AdminCatalogController@';
		Route::get('/', [AdminCatalogController::class, 'getIndex']);

        Route::get('get-catalogs/{id?}', $controller . 'getGetCatalogs')
            ->name('.get_catalogs');

		Route::get('products/{id?}', $controller . 'getProducts')
			->name('.products');

		Route::post('catalog-edit/{id?}', $controller . 'postCatalogEdit')
			->name('.catalogEdit');

		Route::get('catalog-edit/{id?}', $controller . 'getCatalogEdit')
			->name('.catalogEdit');

		Route::post('catalog-save', $controller . 'postCatalogSave')
			->name('.catalogSave');

		Route::post('catalog-reorder', $controller . 'postCatalogReorder')
			->name('.catalogReorder');

		Route::post('catalog-delete/{id}', $controller . 'postCatalogDelete')
			->name('.catalogDel');

        Route::post('catalog-image-delete/{id}', $controller . 'postCatalogImageDelete')
            ->name('.catalogImageDel');

        Route::post('catalog-items-upload/{id}', $controller . 'postCatalogItemsUpload')
            ->name('.catalogItemsUpload');

        Route::post('catalog-item-delete/{id}', $controller . 'postCatalogItemDelete')
            ->name('.catalogItemDelete');

        Route::post('catalog-item-order', $controller . 'postCatalogItemOrder')
            ->name('.catalogItemOrder');

        Route::post('catalog-item-data-save/{id}', $controller . 'postCatalogItemDataSave')
            ->name('.catalogItemDataSave');

        Route::post('catalog-item-edit/{id}', $controller . 'postCatalogItemEdit')
            ->name('.catalogItemEdit');

        Route::post('catalog-card-image-delete/{id}', $controller . 'postTechCardImageDelete')
            ->name('.techCardImageDelete');

        Route::post('catalog-file-delete/{id}', $controller . 'postCatalogFileDelete')
            ->name('.catalogFileDelete');

        Route::post('product-image-delete/{id}', $controller . 'postProductImageDelete')
            ->name('.productImageDel');

        Route::post('product-image-order', $controller . 'postProductImageOrder')
            ->name('.productImageOrder');

		Route::get('product-edit/{id?}', $controller . 'getProductEdit')
			->name('.productEdit');

		Route::post('product-save', $controller . 'postProductSave')
			->name('.productSave');

		Route::post('product-reorder', $controller . 'postProductReorder')
			->name('.productReorder');

		Route::post('update-order/{id}', $controller . 'postUpdateOrder')
			->name('.update-order');

		Route::post('product-delete/{id}', $controller . 'postProductDelete')
			->name('.productDel');

		Route::post('product-image-upload/{id}', $controller . 'postProductImageUpload')
			->name('.productImageUpload');

		Route::post('product-image-delete/{id}', $controller . 'postProductImageDelete')
			->name('.productImageDel');

		Route::post('product-image-order', $controller . 'postProductImageOrder')
			->name('.productImageOrder');

        Route::post('product-delete-char/{id}', $controller . 'postProductDeleteChar')
            ->name('.product-delete-char');

        Route::post('product-update-order-char', $controller . 'postProductUpdateOrderChar')
            ->name('.product-update-order-char');

        //search
        Route::get('search', $controller . 'search')
            ->name('.search');

        //mass
        Route::post('move-products', [
            'as' => '.move-products',
            'uses' => $controller . 'postMoveProducts'
        ]);

        Route::post('publish-products', [
            'as' => '.publish-products',
            'uses' => $controller . 'postPublishProducts'
        ]);

        Route::post('delete-products', [
            'as' => '.delete-products',
            'uses' => $controller . 'postDeleteProducts'
        ]);

        Route::post('delete-products-image', [
            'as' => '.delete-products-image',
            'uses' => $controller . 'postDeleteProductsImage'
        ]);

        Route::post('add-products-images', [
            'as' => '.add-products-images',
            'uses' => $controller . 'postAddProductsImages'
        ]);

	});

    Route::group(['as' => '.prices', 'prefix' => 'prices'], function () {
        $controller = 'AdminPricesController@';
        Route::get('/', $controller . 'getIndex');

        Route::get('edit/{id?}', $controller . 'getEdit')
            ->name('.edit');

        Route::post('save', $controller . 'postSave')
            ->name('.save');

        Route::post('reorder', $controller . 'postReorder')
            ->name('.reorder');

        Route::post('delete/{id}', $controller . 'postDelete')
            ->name('.del');

        Route::post('delete-image/{id}', $controller . 'postDeleteImage')
            ->name('.delImage');
    });

    Route::group(['as' => '.news', 'prefix' => 'news'], function () {
        $controller = 'AdminNewsController@';
        Route::get('/', $controller . 'getIndex');

        Route::get('edit/{id?}', $controller . 'getEdit')
            ->name('.edit');

        Route::post('save', $controller . 'postSave')
            ->name('.save');

        Route::post('delete/{id}', $controller . 'postDelete')
            ->name('.delete');

        Route::post('delete-image/{id}', $controller . 'postDeleteImage')
            ->name('.delete-image');

        Route::post('news-image-upload/{id}', $controller . 'postNewsImageUpload')
            ->name('.newsImageUpload');

        Route::post('news-image-delete/{id}', $controller . 'postNewsImageDelete')
            ->name('.newsImageDel');

        Route::post('news-image-order', $controller . 'postNewsImageOrder')
            ->name('.newsImageOrder');

        Route::post('image-edit/{id}', $controller . 'postImageEdit')
            ->name('.imageEdit');

        Route::post('image-data-save/{id}', $controller . 'postImageDataSave')
            ->name('.imageDataSave');
    });

    Route::group(['as' => '.projects', 'prefix' => 'projects'], function () {
        $controller = 'AdminProjectController@';
        Route::get('/', $controller . 'getIndex');

        Route::get('edit/{id?}', $controller . 'getEdit')
            ->name('.edit');

        Route::post('save', $controller . 'postSave')
            ->name('.save');

        Route::post('delete/{id}', $controller . 'postDelete')
            ->name('.delete');

        Route::post('reorder', $controller . 'postReorder')
            ->name('.reorder');

        Route::post('delete-image/{id}', $controller . 'postDeleteImage')
            ->name('.delete-image');

        Route::post('update-order/{id}', $controller . 'postUpdateOrder')
            ->name('.update-order');

        Route::post('add-images/{id}', $controller . 'postProductImageUpload')
            ->name('.add_images');

        Route::post('image-data-save/{id}', $controller . 'postImageDataSave')
            ->name('.imageDataSave');

        Route::post('image-edit/{id}', $controller . 'postImageEdit')
            ->name('.imageEdit');

        Route::post('del-images/{id}', $controller . 'postDelImg')
            ->name('.del_img');

        Route::post('update-gallery-order', $controller . 'postGalleryImageOrder')
            ->name('.update-gallery-order');
    });

    Route::group(['as' => '.vacancies', 'prefix' => 'vacancies'], function () {
        $controller = 'AdminVacanciesController@';
        Route::get('/', $controller . 'getIndex');

        Route::get('edit/{id?}', $controller . 'getEdit')
            ->name('.edit');

        Route::post('save', $controller . 'postSave')
            ->name('.save');

        Route::post('reorder', $controller . 'postReorder')
            ->name('.reorder');

        Route::post('delete/{id}', $controller . 'postDelete')
            ->name('.delete');
    });

    Route::group(['as' => '.certificates', 'prefix' => 'certificates'], function () {
        $controller = 'AdminCertificatesController@';
        Route::get('/', $controller . 'getIndex');
        Route::post('image-upload', $controller . 'postImageUpload')
            ->name('.imageUpload');
        Route::post('image-edit/{id}', $controller . 'postImageEdit')
            ->name('.imageEdit');
        Route::post('image-data-save/{id}', $controller . 'postImageDataSave')
            ->name('.imageDataSave');
        Route::post('image-del/{id}', $controller . 'postImageDelete')
            ->name('.imageDel');
        Route::post('image-order', $controller . 'postImageOrder')
            ->name('.order');
    });

    Route::group(['as' => '.services', 'prefix' => 'services'], function () {
        $controller = 'AdminServicesController@';
        Route::get('/', $controller . 'getIndex');

        Route::get('edit/{id?}', $controller . 'getEdit')
            ->name('.edit');

        Route::post('save', $controller . 'postSave')
            ->name('.save');

        Route::post('reorder', $controller . 'postReorder')
            ->name('.reorder');

        Route::post('delete/{id}', $controller . 'postDelete')
            ->name('.del');

        Route::post('delete-image/{id}', $controller . 'postDeleteImage')
            ->name('.delImage');
    });

    Route::group(['as' => '.orders', 'prefix' => 'orders'], function () {
		$controller = 'AdminOrdersController@';
		Route::get('/', $controller . 'getIndex');

		Route::get('view/{id?}', $controller . 'getView')
			->name('.view');

		Route::post('del/{id}', $controller . 'postDelete')
			->name('.del');
	});

	Route::group(['as' => '.gallery', 'prefix' => 'gallery'], function () {
		$controller = 'AdminGalleryController@';
		Route::get('/', $controller . 'anyIndex');
		Route::post('gallery-save', $controller . 'postGallerySave')
			->name('.gallerySave');
		Route::post('gallery-edit/{id?}', $controller . 'postGalleryEdit')
			->name('.gallery_edit');
		Route::post('gallery-delete/{id}', $controller . 'postGalleryDelete')
			->name('.galleryDel');
		Route::any('items/{id}', $controller . 'anyItems')
			->name('.items');
		Route::post('image-upload/{id}', $controller . 'postImageUpload')
			->name('.imageUpload');
		Route::post('image-edit/{id}', $controller . 'postImageEdit')
			->name('.imageEdit');
		Route::post('image-data-save/{id}', $controller . 'postImageDataSave')
			->name('.imageDataSave');
		Route::post('image-del/{id}', $controller . 'postImageDelete')
			->name('.imageDel');
		Route::post('image-order', $controller . 'postImageOrder')
			->name('.order');
	});

	Route::group(['as' => '.reviews', 'prefix' => 'reviews'], function () {
		$controller = 'AdminReviewsController@';
		Route::get('/', $controller . 'getIndex');

		Route::get('edit/{id?}', $controller . 'getEdit')
			->name('.edit');

		Route::post('save', $controller . 'postSave')
			->name('.save');

		Route::post('reorder', $controller . 'postReorder')
			->name('.reorder');

		Route::post('delete/{id}', $controller . 'postDelete')
			->name('.del');

        Route::post('delete-image/{id}', $controller . 'postDeleteImage')
            ->name('.delImage');
	});

    Route::group(['as' => '.feedbacks', 'prefix' => 'feedbacks'], function () {
        $controller = 'AdminFeedbacksController@';
        Route::get('/', $controller . 'getIndex');

        Route::post('read/{id?}',$controller . 'postRead')
            ->name('.read');
        Route::post('delete/{id?}', $controller . 'postDelete')
            ->name('.del');
    });

    Route::group(['as' => '.settings', 'prefix' => 'settings', 'middleware' => ['admin.fanky']], function () {
        $controller = 'AdminSettingsController@';
        Route::get('/', $controller . 'getIndex');

        Route::get('group-items/{id?}', $controller . 'getGroupItems')
            ->name('.groupItems');

        Route::post('group-save', $controller . 'postGroupSave')
            ->name('.groupSave');

        Route::post('group-delete/{id}', $controller . 'postGroupDelete')
            ->name('.groupDel');

        Route::post('clear-value/{id}', $controller . 'postClearValue')
            ->name('.clearValue');

        Route::any('edit/{id?}', $controller . 'anyEditSetting')
            ->name('.edit');

        Route::any('block-params', $controller . 'anyBlockParams')
            ->name('.blockParams');

        Route::post('edit-setting-save', $controller . 'postEditSettingSave')
            ->name('.editSave');

        Route::post('save', $controller . 'postSave')
            ->name('.save');
    });

    Route::group(['as' => '.users', 'prefix' => 'users', 'middleware' => ['admin.fanky']], function () {
        $controller = 'AdminUsersController@';
        Route::get('/', $controller . 'getIndex');

        Route::post('edit/{id?}', $controller . 'postEdit')
            ->name('.edit');

        Route::post('save', $controller . 'postSave')
            ->name('.save');

        Route::post('del/{id}', $controller . 'postDelete')
            ->name('.del');
    });
});
