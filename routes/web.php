<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Services\GoogleCalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Main Page Route
Auth::routes(["register" => false]);
Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
Route::group(['middleware' => 'auth'], function(){

    //User Roles
    Route::group(['prefix' => 'admin'], function (){
        Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
        Route::get('/user/show/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
        Route::get('/user/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.index');
        Route::get('/role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
        Route::post('/role/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.store');
        Route::get('/role/show/{role}', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('role.show');
        Route::get('/role/{role}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
        Route::put('role/{role}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
        Route::delete('/role/{role}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.destroy');
    });

    //Text Editor
    Route::get('/textEditor', [App\Http\Controllers\TextController::class, 'index'])->name('textEditor.index');
    Route::get('/textEditor/create', [App\Http\Controllers\TextController::class, 'create'])->name('textEditor.create');
    Route::post('/textEditor/store', [App\Http\Controllers\TextController::class, 'store'])->name('textEditor.store');
    Route::get('/textEditor/show/{textEditor}', [App\Http\Controllers\TextController::class, 'show'])->name('textEditor.show');
    Route::get('/textEditor/{textEditor}/edit', [App\Http\Controllers\TextController::class, 'edit'])->name('textEditor.edit');
    Route::put('textEditor/{textEditor}', [App\Http\Controllers\TextController::class, 'update'])->name('textEditor.update');
    Route::delete('/textEditor/{textEditor}', [App\Http\Controllers\TextController::class, 'destroy'])->name('textEditor.destroy');

    //Code Editor
    Route::get('/codeEditor', [App\Http\Controllers\CodeController::class, 'index'])->name('codeEditor.index');
    Route::get('/codeEditor/create', [App\Http\Controllers\CodeController::class, 'create'])->name('codeEditor.create');
    Route::post('/codeEditor/store', [App\Http\Controllers\CodeController::class, 'store'])->name('codeEditor.store');
    Route::get('/codeEditor/show/{codeEditor}', [App\Http\Controllers\CodeController::class, 'show'])->name('codeEditor.show');
    Route::get('/codeEditor/{codeEditor}/edit', [App\Http\Controllers\CodeController::class, 'edit'])->name('codeEditor.edit');
    Route::put('codeEditor/{codeEditor}', [App\Http\Controllers\CodeController::class, 'update'])->name('codeEditor.update');
    Route::delete('/codeEditor/{codeEditor}', [App\Http\Controllers\CodeController::class, 'destroy'])->name('codeEditor.destroy');

    //Calendar
//    Route::get('/google/auth', [GoogleController::class, 'redirectToGoogle'])->name('google.auth');
//    Route::get('/oauth/authorize', [GoogleController::class, 'authorizeGoogle'])->name('oauth.authorize');
//    Route::get('/oauth2/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('oauth.callback');
//
//    // Events Routes
//    Route::prefix('events')->name('events.')->group(function () {
//        Route::resource('/', App\Http\Controllers\EventsController::class);
//        Route::get('/delete', [App\Http\Controllers\EventsController::class, 'delete']);
//        Route::get('/fetchEvents', [App\Http\Controllers\EventsController::class, 'fetchEvents']);
//
//    });

});

Route::fallback(function () {
    return view('/content/miscellaneous/error'); // Assumes you have a blade view named 404.blade.php
});
