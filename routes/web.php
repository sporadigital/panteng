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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/form', 'PublicController@form')->name('form');
Route::post('/form', 'PublicController@form_send');
Route::get('/home', 'HomeController@table')->name('home');
Route::post('/home', 'HomeController@table_unduh');
Route::get('/data', 'HomeController@table_data')->name('data');
Route::get('/pass', 'HomeController@index')->name('pass');
Route::get('/detil', 'HomeController@detail')->name('detail');
Route::post('/hapus', 'HomeController@remove')->name('remove');
