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

// Route::get('/', function () {
//     return view('beranda/utama');
// });


Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/','PertanyaanController@index');
Route::resource('jawaban', 'JawabanController');
Route::get('/profile','PertanyaanController@index2');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
