<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\HomeController@index')->name('home.index');
Route::get('/site/{slug}/CafeSite', 'Frontend\HomeController@show')->name('show.siteInfo');
Route::get('/category/{slug}/sites', 'Frontend\HomeController@showCategorySites')->name('more.index');
Route::post('/comment', 'Frontend\HomeController@store')->name('comment.store');
Route::get('/search/sites', 'Frontend\HomeController@searchTitleSites')->name('sites.search');

Route::group(['middleware'=>'admin'], function(){
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
        Route::resource('/categories', 'Admin\CategoryController');
        Route::resource('/sites', 'Admin\SiteController');
        Route::get('/search', 'Admin\SiteController@searchTitle')->name('site.search');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
