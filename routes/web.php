<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/chat', [App\Http\Controllers\ChatMessageController::class, 'index'])->name('chat');
Route::get('/message', [App\Http\Controllers\MessageController::class, 'index'])->name('message');
Route::post('/message', [App\Http\Controllers\MessageController::class, 'store'])->name('message');