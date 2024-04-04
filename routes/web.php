<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/admin')->group(function(){
   
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginPost']);
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::post('/register', [AdminController::class, 'registerPost']);
    Route::get('/logout', [AdminController::class, 'logout']);


    Route::resource('/author', AuthorController::class)->except(['show', 'edit']);
    Route::resource('/book', BookController::class)->except(['show', 'edit']);



});


Route::get('/', [AdminController::class, 'login'] );

