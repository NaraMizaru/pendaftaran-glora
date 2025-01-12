<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\DashboardController;
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

Route::redirect('/', '/form');

Route::controller(FormController::class)->group(function () {
    Route::get('/form', 'index')->name('form.index');
    Route::get('/regist/success', 'success')->name('form.success');

    Route::post('/form', 'daftar')->name('form.daftar');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard.index');
    Route::get('/dashboard/export-data', 'exportData')->name('dashboard.export');
});

Route::controller(BantuanController::class)->group(function () {
    Route::get('/dukungan', 'index')->name('dukungan.index');
});
