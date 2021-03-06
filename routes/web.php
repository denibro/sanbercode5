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

// Route::get('/pertanyaan', 'PertanyaanController@index');
// Route::get('/pertanyaan/create', 'PertanyaanController@create');
// Route::post('/pertanyaan', 'PertanyaanController@store');
// Route::get('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@show');
// Route::get('/pertanyaan/{pertanyaan_id}/edit', 'PertanyaanController@edit');
// Route::put('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@update');
// Route::delete('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@destroy');

Route::get('/', 'PertanyaanController@index');

Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('jawaban', 'JawabanController');

Route::get('/profile', 'PertanyaanController@index2')->name('pertanyaan.profile');
Route::put('/ket_pertanyaan/{pertanyaan_id}', 'PertanyaanController@update2');
Route::get('/pertanyaan_umum/{pertanyaan_id}', 'PertanyaanController@show_umum');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::POST('/votePertanyaan/{id}', 'Vote_pertanyaanController@store');
