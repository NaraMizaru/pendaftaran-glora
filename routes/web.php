<?php

use App\Http\Controllers\FormController;
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

Route::controller(FormController::class)->group(function () {
    Route::get('/form', 'index')->name('form.index');
    Route::post('/form', 'daftar')->name('form.daftar');
});