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

// Route::get('/', function () {
//     return view('beranda/utama');
// });


<<<<<<< HEAD
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/','PertanyaanController@index');
Route::resource('jawaban', 'JawabanController');
Route::get('/profile','PertanyaanController@index2');







=======
Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('jawaban', 'JawabanController');
>>>>>>> 0413778ef52e4adf6d3eb78b5934d8009216def1

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
