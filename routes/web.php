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
