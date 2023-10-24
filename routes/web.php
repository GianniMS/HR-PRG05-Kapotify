<?php

use App\Http\Middleware\CheckLoginCount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\AboutUsController@index')->name('about');

// Profile route
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');

// Project routes
Route::resource('projects', 'App\Http\Controllers\ProjectController');


// Admin routes (if applicable)
Route::middleware(['role:2'])->group(function () {
    // User list and role change
    Route::get('/user-list', 'App\Http\Controllers\UserListController@index')->name('user-list');
    Route::post('/change-role/{user}', 'App\Http\Controllers\UserListController@changeRole')->name('change-role');

    // Sample management
    Route::get('/project-manager', 'App\Http\Controllers\ProjectManagerController@index')->name('project-manager');
    Route::post('/toggle-project/{project}', 'App\Http\Controllers\ProjectController@toggle')->name('toggle-project');
});
