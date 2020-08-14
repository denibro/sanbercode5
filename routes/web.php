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

Route::get('/', 'PertanyaanController@index');

Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/beranda', 'PertanyaanController@index');
Route::resource('jawaban', 'JawabanController');
Route::get('/profile', 'PertanyaanController@index2')->name('pertanyaan.profile');



Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('jawaban', 'JawabanController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
