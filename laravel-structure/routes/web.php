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

Route::get('/', 'User\HomeController@index');
Route::get('tes', 'User\HomeController@tes');

Route::get('detail', 'User\HomeController@show');
Route::get('about', 'User\HomeController@about');

Route::group(['middleware' => ['auth', 'checkRole:1']],function() {
  Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminPageController@index');
    //wisata
    Route::prefix('wisata')->group(function () {
      Route::get('/', 'Admin\AdminWisataController@index')->name('wisata');
      Route::get('data', 'Admin\AdminWisataController@getWisataDatatable');
      Route::get('datatable', 'Admin\AdminWisataController@loadDataTable');
      Route::post('/', 'Admin\AdminWisataController@store');
      Route::get('edit/{id}', 'Admin\AdminWisataController@edit');
    });

  });
  Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/login-tes', 'User\HomeController@login');


Auth::routes();
