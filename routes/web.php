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
    return view('welcome');
});


Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/pertanyaan/umum','PertanyaanUmumController@index');
Route::resource('jawaban', 'JawabanController');
Route::get('/pertanyaan/pribadi','PertanyaanPribadiController@index2');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
