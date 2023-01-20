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

Route::get('/', function () {
    return view('login');
});
Route::get('/reset_password_request', function () {
    return view('reset_password_request');
});
Route::get('/user_reset_password_form', function () {
    return view('user_reset_password_form');
});
Route::get('/', function () {
    return view('login');
});
Route::get('/test', [\App\Http\Controllers\MainController::class, 'index']);
Route::get('/test2', [\App\Http\Controllers\MainController::class, 'sendLink']);
