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


Route::get('/', 'HomeController@index')->name('home');
Route::get('post/{id}/details', 'HomeController@details')->name('post.details');
Route::get('author/{id}/details', 'HomeController@authordetails')->name('author.details');
Route::get('about', 'HomeController@about')->name('about');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('category/{id}/post', 'HomeController@category')->name('category');

Route::get('login', 'LoginController@index')->name('user.login');
Route::post('login', 'LoginController@login')->name('login');
Route::post('logout', 'LoginController@logout')->name('logout');
Route::get('admin', 'LoginController@admin')->name('admin');

Route::middleware('auth')->group(function (){
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('author', 'AuthorController');

});


