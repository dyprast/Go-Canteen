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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('kantin')->group(function(){
    Route::get('/', 'App\KantinController@index')->name('kantinIndex');
    Route::get('/tambah', 'App\KantinController@add')->name('kantinAdd');
    Route::post('/simpan', 'App\KantinController@save')->name('kantinSave');
    Route::get('/edit/{id}', 'App\KantinController@edit')->name('kantinEdit');
    Route::post('/update/{id}', 'App\KantinController@update')->name('kantinUpdate');
    Route::get('/delete/{id}', 'App\KantinController@delete')->name('kantinDelete');
});

Route::prefix('menu')->group(function(){
    Route::get('/', 'App\KantinController@menu_index')->name('menuIndex');
    Route::get('/tambah', 'App\KantinController@menu_add')->name('menuAdd');
    Route::post('/simpan', 'App\KantinController@menu_save')->name('menuSave');
    Route::get('/edit/{id}', 'App\KantinController@menu_edit')->name('menuEdit');
    Route::post('/update/{id}', 'App\KantinController@menu_update')->name('menuUpdate');
    Route::get('/delete/{id}', 'App\KantinController@menu_delete')->name('menuDelete');
});