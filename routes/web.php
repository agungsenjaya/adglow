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

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::GET('/home', 'AdminController@home')->name('home');

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
