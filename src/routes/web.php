<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('pages/index');
});

Route::get('/form', function () {
    return view('pages/form');
});

Route::get('/messages', [MessageController::class, 'messages']);

Route::get('/subscribers', [ListController::class, 'subscribers']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();
