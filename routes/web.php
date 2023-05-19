<?php

use App\Http\Controllers\masterController;
use App\Http\Controllers\summaryController;
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
    return view('layout.mainlogin');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/master', [masterController::class, 'index'])->name('master');
Route::get('/summary', [summaryController::class, 'index'])->name('summary');


