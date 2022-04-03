<?php

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

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('user.question');
Route::post('/', [\App\Http\Controllers\WelcomeController::class, 'answer'])->name('user.answer');

// Auth::routes();
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::middleware('auth:web')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/ajax', [App\Http\Controllers\HomeController::class, 'get_player'])->name('home.ajax');
    Route::get('/questions', [App\Http\Controllers\HomeController::class, 'question'])->name('questions');
    Route::post('/questions', [App\Http\Controllers\HomeController::class, 'saveQuestion'])->name('questions.post');
});
