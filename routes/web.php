<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/',[\App\Http\Controllers\DashboardController::class,'index']);
Route::get('/about',function (){
    return Inertia::render('About',[
        'nama'=>'Ridhal'
    ]);
});
Route::get('/user',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
Route::put('/user',[\App\Http\Controllers\UserController::class,'update']);
Route::get('/user/{id}/edit',[\App\Http\Controllers\UserController::class,'edit']);
Route::post('/user',[\App\Http\Controllers\UserController::class,'store']);
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index']);
Route::post('/dashboard',[\App\Http\Controllers\DashboardController::class,'store']);
