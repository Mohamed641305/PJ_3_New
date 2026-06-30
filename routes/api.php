<?php

use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/all', [UserController::class, 'index']);
Route::get('/user/show/{id}', [UserController::class, 'show']);
Route::post('/user/delete/', [UserController::class, 'delete']);
Route::post('/user/store/', [UserController::class, 'store']);
Route::get('/user/update/', [UserController::class, 'update']);

// Route::get('/courses/all', [CourseController::class, 'index']);
// Route::get('/courses/{id}', [CourseController::class, 'show']);
// Route::post('/courses/store', [CourseController::class, 'store']);
// Route::put('/courses/update/{id}', [CourseController::class, 'update']);
// Route::delete('/courses/delete/{id}', [CourseController::class, 'delete']);
