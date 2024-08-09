<?php

use App\Http\Controllers\DashboardController;
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

// Main Page Route
Auth::routes(["register" => false]);
Route::get('/', [\App\Http\Controllers\StudentController::class, 'index']);
Route::group(['middleware' => 'auth'], function(){
    //User Roles
    Route::group(['prefix' => 'admin'], function (){
        Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
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

    //Student
    Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::get('/student/show/{student}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
    Route::get('/student/{student}/edit', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
    Route::put('student/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');

    //Company
    Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/show/{company}', [App\Http\Controllers\CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
    Route::put('company/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{company}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');


});

Route::fallback(function () {
    return view('/content/miscellaneous/error'); // Assumes you have a blade view named 404.blade.php
});
