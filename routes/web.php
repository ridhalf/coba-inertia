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

Route::get('/', function () {
    return Inertia::render('Welcome');
});
Route::get('/about',function (){
    return Inertia::render('About',[
        'nama'=>'Ridhal'
    ]);
});
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index']);
Route::post('/dashboard',[\App\Http\Controllers\DashboardController::class,'store']);
