<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();

// student auth
Route::group(['prefix' => 'user', 'middleware'=>['isUser','auth']], function () {
    Route::post('login', [UserController::class, 'handle'])->name('login');
});
// admin auth
Route::group(['prefix' => 'user', 'middleware'=>['isAdmin','auth']], function () {
    Route::post('login', [UserController::class, 'handle'])->name('login');
});



//first user
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');




// ClassroomsController Routes
Route::post('classroom', [ClassroomsController::class,'store']);
Route::get('classrooms', [ClassroomsController::class,'index']);
Route::get('classroom/{id}', [ClassroomsController::class,'show']);

Route::put('classroom/{id}', [ClassroomsController::class,'update']);
Route::delete('classroom/{id}', [ClassroomsController::class,'destroy']);

// StudentsController Routes
Route::post('student', [StudentController::class,'store']);
Route::get('students', [StudentController::class,'index']);
Route::get('student/{id}', [StudentController::class,'show']);

Route::put('student/{id}', [StudentController::class,'update']);
Route::delete('student/{id}', [StudentController::class,'destroy']);








