<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PublisherController;

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

Route::redirect('/list', '/list/messages');
Route::get('/list/messages', [MessageController::class, 'messages']);
Route::get('/list/subscribers', [SubscriberController::class, 'subscribers']);
Route::get('/list/publishers', [PublisherController::class, 'publishers']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();
