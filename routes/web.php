<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){
    return view('home');
});
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/samples', 'App\Http\Controllers\SampleController@index')->name('samples');

Route::get('/about', 'App\Http\Controllers\AboutUsController@index')->name('about');

