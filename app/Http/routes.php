<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/article/select', ['uses' => 'ArticleController@selectDate']); // 时间轴

Route::get('/article/{id}', ['as' => 'article', 'uses' => 'ArticleController@index']);

Route::get('/category/{id}', ['as' => 'category', 'uses' => 'CategoryController@index']);

Route::get('/tag/{id}', ['as' => 'tag', 'uses' => 'TagController@index']);

Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@index']);

Route::get('/page/{alias}', ['as' => 'page.show', 'uses' => 'PageController@index']);

Route::get('/about',['as'=>'about','uses'=>'PageController@about']);

Route::post('/comment',['as'=>'comment','uses'=>'CommentController@store']);

Route::get('/send',['as'=>'send','uses'=>'CommentController@send']);


Route::group(['prefix' => 'lufeijun'], function () {

    Route::get('/login', 'Backend\AuthController@showLoginForm');

    Route::post('/login', 'Backend\AuthController@login');

    Route::get('/logout', 'Backend\AuthController@logout');

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/', ['as' => 'lufeijun.home', 'uses' => 'Backend\HomeController@index']);

        Route::resource('article', 'Backend\ArticleController');

        Route::resource('comment','Backend\CommentController');

        Route::resource('category', 'Backend\CategoryController');

        Route::get('category/set-nav/{id}', ['as' => 'lufeijun.category.set-nav', 'uses' => 'Backend\CategoryController@setNavigation']);

        Route::resource('user', 'Backend\UserController');

        Route::resource('tag', 'Backend\TagController');

        Route::resource('link', 'Backend\LinkController');

        Route::resource('navigation', 'Backend\NavigationController');

        Route::get('upload', ['as' => 'lufeijun.upload.index', 'uses' => 'Backend\UploadController@index']);

        Route::resource('page', 'Backend\PageController');

        Route::get('system', ['as' => 'lufeijun.system.index', 'uses' => 'Backend\SystemController@index']);

        Route::post('system', ['as' => 'lufeijun.system.store', 'uses' => 'Backend\SystemController@store']);

        Route::get('upload', ['as' => 'lufeijun.upload.index', 'uses' => 'Backend\UploadController@index']);

        Route::delete('file-del', ['as' => 'lufeijun.upload.file-del', 'uses' => 'Backend\UploadController@fileDelete']);

        Route::delete('dir-del', ['as' => 'lufeijun.upload.dir-del', 'uses' => 'Backend\UploadController@dirDelete']);

        Route::post('mkdir', ['as' => 'lufeijun.upload.mkdir', 'uses' => 'Backend\UploadController@makeDir']);

        Route::get('file-upload', ['as' => 'lufeijun.upload.file-upload', 'uses' => 'Backend\UploadController@fileUpload']);

        Route::post('uploadimage',['uses'=>'Backend\UploadController@uploadimage']);

        Route::post('file-store', ['as' => 'lufeijun.upload.file-store', 'uses' => 'Backend\UploadController@fileStore']);
    });
});
