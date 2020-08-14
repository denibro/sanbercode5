<?php

use Illuminate\Support\Facades\Auth;
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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pertanyaan','PertanyaanController@index');
Route::get('/pertanyaan/create','PertanyaanController@create');
Route::post('/pertanyaan','PertanyaanController@store');
Route::get('/pertanyaan/{pertanyaan_id}','PertanyaanController@show');
Route::get('/pertanyaan/{pertanyaan_id}/edit','PertanyaanController@edit');
Route::put('/pertanyaan/{pertanyaan_id}','PertanyaanController@update');
Route::delete('/pertanyaan/{pertanyaan_id}','PertanyaanController@destroy');
=======
Route::get('/', 'PertanyaanController@index');

Route::get('/pertanyaan/create', 'PertanyaanController@create');
>>>>>>> 30bfda3f3ab1891f2ccc0167ecc1b523fd4d8b58
Route::get('/beranda', 'PertanyaanController@index');
Route::resource('jawaban', 'JawabanController');
Route::get('/profile', 'PertanyaanController@index2')->name('pertanyaan.profile');



Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('jawaban', 'JawabanController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');