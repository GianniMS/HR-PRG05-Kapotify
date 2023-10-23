<?php

use App\Http\Middleware\CheckLoginCount;
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
// Authentication routes
Auth::routes();

// Home and About routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutUsController@index')->name('about');

// Profile route
Route::get('/profile', 'ProfileController@index')->name('profile');

// Sample routes
Route::resource('samples', 'SampleController');


// Admin routes (if applicable)
Route::middleware(['role:2'])->group(function () {
    // User list and role change
    Route::get('/user-list', 'UserListController@index')->name('user-list');
    Route::post('/change-role/{user}', 'UserListController@changeRole')->name('change-role');

    // Sample management
    Route::get('/post-manager', 'PostManagerController@index')->name('post-manager');
    Route::post('/toggle-sample/{sample}', 'SampleController@toggle')->name('toggle-sample');
});
