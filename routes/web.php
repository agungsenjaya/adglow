<?php

use Illuminate\Support\Facades\Route;

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

// Route::GET('/', function () {
//     return view('welcome');
// });

Route::GET('/','ClientController@home')->name('index');
Route::GET('/movies','ClientController@movies')->name('movies');
Route::GET('/movies/view/{slug}','ClientController@movies_view')->name('movies_view');

Route::GET('/miniseries','ClientController@miniseries')->name('miniseries');
Route::GET('/miniseries/view/{slug}','ClientController@miniseries_view')->name('miniseries_view');

Route::GET('/commercial','ClientController@commercial')->name('commercial');
Route::GET('/commercial/view/{slug}','ClientController@commercial_view')->name('commercial_view');

Route::GET('/music','ClientController@music')->name('music');
Route::GET('/music/view/{slug}','ClientController@music_view')->name('music_view');

Route::GET('/book','ClientController@book')->name('book');
Route::GET('/book/view/{slug}','ClientController@book_view')->name('book_view');

Route::GET('/documentary','ClientController@documentary')->name('documentary');
Route::GET('/documentary/view/{slug}','ClientController@documentary_view')->name('documentary_view');

Route::GET('/news','ClientController@news')->name('news');
Route::GET('/news/view/{slug}','ClientController@news_view')->name('news_view');

Auth::routes([
    'register' => false,
    'reset' => false,
]);


Route::GROUP(['prefix' => 'dashboard',  'middleware' => ['auth:web']], function(){

Route::GET('/', 'AdminController@home')->name('home');
Route::GET('account', 'AdminController@account')->name('admin.account');
Route::POST('account/update', 'AdminController@account_update')->name('admin.account_update');

Route::GET('/movies', 'AdminController@movies')->name('admin.movies');
Route::GET('/movies/create', 'AdminController@movies_create')->name('admin.movies_create');
Route::POST('/movies/store', 'AdminController@movies_store')->name('admin.movies_store');
Route::GET('/movies/edit/{id}', 'AdminController@movies_edit')->name('admin.movies_edit');
Route::POST('/movies/update/{id}', 'AdminController@movies_update')->name('admin.movies_update');

Route::GET('/miniseries', 'AdminController@miniseries')->name('admin.miniseries');
Route::GET('/miniseries/create', 'AdminController@miniseries_create')->name('admin.miniseries_create');
Route::POST('/miniseries/store', 'AdminController@miniseries_store')->name('admin.miniseries_store');
Route::GET('/miniseries/edit/{id}', 'AdminController@miniseries_edit')->name('admin.miniseries_edit');
Route::POST('/miniseries/update/{id}', 'AdminController@miniseries_update')->name('admin.miniseries_update');

Route::GET('/commercial', 'AdminController@commercial')->name('admin.commercial');
Route::GET('/commercial/create', 'AdminController@commercial_create')->name('admin.commercial_create');
Route::POST('/commercial/store', 'AdminController@commercial_store')->name('admin.commercial_store');
Route::GET('/commercial/edit/{id}', 'AdminController@commercial_edit')->name('admin.commercial_edit');
Route::POST('/commercial/update/{id}', 'AdminController@commercial_update')->name('admin.commercial_update');

Route::GET('/music', 'AdminController@music')->name('admin.music');
Route::GET('/music/create', 'AdminController@music_create')->name('admin.music_create');
Route::POST('/music/store', 'AdminController@music_store')->name('admin.music_store');
Route::GET('/music/edit/{id}', 'AdminController@music_edit')->name('admin.music_edit');
Route::POST('/music/update/{id}', 'AdminController@music_update')->name('admin.music_update');

Route::GET('/book', 'AdminController@book')->name('admin.book');
Route::GET('/book/create', 'AdminController@book_create')->name('admin.book_create');
Route::POST('/book/store', 'AdminController@book_store')->name('admin.book_store');
Route::GET('/book/edit/{id}', 'AdminController@book_edit')->name('admin.book_edit');
Route::POST('/book/update/{id}', 'AdminController@book_update')->name('admin.book_update');

Route::GET('/documentary', 'AdminController@documentary')->name('admin.documentary');
Route::GET('/documentary/create', 'AdminController@documentary_create')->name('admin.documentary_create');
Route::POST('/documentary/store', 'AdminController@documentary_store')->name('admin.documentary_store');
Route::GET('/documentary/edit/{id}', 'AdminController@documentary_edit')->name('admin.documentary_edit');
Route::POST('/documentary/update/{id}', 'AdminController@documentary_update')->name('admin.documentary_update');

Route::GET('/news', 'AdminController@news')->name('admin.news');
Route::GET('/news/create', 'AdminController@news_create')->name('admin.news_create');
Route::POST('/news/store', 'AdminController@news_store')->name('admin.news_store');
Route::GET('/news/edit/{id}', 'AdminController@news_edit')->name('admin.news_edit');
Route::POST('/news/update/{id}', 'AdminController@news_update')->name('admin.news_update');

Route::GET('/genre', 'AdminController@genre')->name('admin.genre');
Route::GET('/genre/create', 'AdminController@genre_create')->name('admin.genre_create');
Route::POST('/genre/store', 'AdminController@genre_store')->name('admin.genre_store');
Route::GET('/genre/edit/{id}', 'AdminController@genre_edit')->name('admin.genre_edit');
Route::POST('/genre/update/{id}', 'AdminController@genre_update')->name('admin.genre_update');


});