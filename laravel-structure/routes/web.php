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
//Route User
Route::get('/', 'User\HomeController@index');
Route::get('tes', 'User\HomeController@tes');

Route::get('detail', 'User\HomeController@show');
Route::get('about', 'User\HomeController@about');

//logout
Route::get('logout', 'Admin\AdminPageController@logout')->name('logout');

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
      Route::post('update/{id}', 'Admin\AdminWisataController@update');
      Route::get('delete/{id}', 'Admin\AdminWisataController@destroy');
    });
    //Kuliner
    Route::prefix('kuliner')->group(function () {
      Route::get('/', 'Admin\AdminKulinerController@index')->name('kuliner');
      Route::get('data', 'Admin\AdminKulinerController@getKulinerDatatable');
      Route::get('datatable', 'Admin\AdminKulinerController@loadDataTable');
      Route::post('/', 'Admin\AdminKulinerController@store');
      Route::get('edit/{id}', 'Admin\AdminKulinerController@edit');
      Route::post('update/{id}', 'Admin\AdminKulinerController@update');
      Route::get('delete/{id}', 'Admin\AdminKulinerController@destroy');
    });
    //artikel
    Route::prefix('artikel')->group(function () {
      Route::get('/', 'Admin\AdminArtikelController@index')->name('artikel');
      Route::get('data', 'Admin\AdminArtikelController@getArtikelDatatable');
      Route::get('datatable', 'Admin\AdminArtikelController@loadDataTable');
      Route::post('/', 'Admin\AdminArtikelController@store');
      Route::get('edit/{id}', 'Admin\AdminArtikelController@edit');
      Route::post('update/{id}', 'Admin\AdminArtikelController@update');
      Route::get('delete/{id}', 'Admin\AdminArtikelController@destroy');
    });

  });
  Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/login-tes', 'User\HomeController@login');


Auth::routes();
