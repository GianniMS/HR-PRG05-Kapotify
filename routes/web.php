<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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

Route::resource('samples', App\Http\Controllers\SampleController::class);

Route::get('/about', 'App\Http\Controllers\AboutUsController@index')->name('about');

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

//Admin Routes
Route::get('/post-manager', [App\Http\Controllers\PostManagerController::class, 'index'])->name('post-manager');

Route::get('/user-list', [App\Http\Controllers\UserListController::class, 'index'])->name('user-list');

