<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware'=>['isAdmin','auth']], function () {
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('admin/login',[AdminAuthController::class,'login'])->name('login.api');
    Route::post('admin/register',[AdminAuthController::class,'register'])->name('register.api');
    Route::post('admin/logout', [AdminAuthController::class,'logout'])->name('logout.api');
});

// user Routes
Route::group(['prefix' => 'user', 'middleware'=>['isUser','auth']], function () {
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
    Route::post('login', [UserController::class, 'handle'])->name('login');
});


//first user
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');




// ClassroomsController Routes
Route::post('classroom', [ClassroomsController::class,'store']);
Route::get('classrooms', [ClassroomsController::class,'index']);
Route::get('classroom/{id}', [ClassroomsController::class,'show']);

Route::put('classroom{id}', [ClassroomsController::class,'update']);
Route::delete('classroom/{id}', [ClassroomsController::class,'destroy']);







