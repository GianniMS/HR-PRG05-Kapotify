<?php

use App\Http\Middleware\CheckLoginCount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

//Authentication routes
Auth::routes();

//Home and About routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\AboutUsController@index')->name('about');

//Profile route
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::put('/profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');


//Project routes , search is on top to prevent conflicting routes
Route::get('/projects/search', 'App\Http\Controllers\ProjectController@search')->name('projects.search');
Route::resource('projects', 'App\Http\Controllers\ProjectController');

//Admin routes, checks if role = 2 (admin)
Route::middleware(['role:2'])->group(function () {
    // User list and role change
    Route::get('/user-list', 'App\Http\Controllers\UserListController@index')->name('user-list');
    Route::post('/change-role/{user}', 'App\Http\Controllers\UserListController@changeRole')->name('change-role');

    // Sample management
    Route::get('/project-manager', 'App\Http\Controllers\ProjectManagerController@index')->name('project-manager');
    Route::post('/toggle-project/{project}', 'App\Http\Controllers\ProjectController@toggle')->name('toggle-project');
});
