<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\InputPelanggaranController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('login.before-login');
});

Route::get('/welcome', function () {
    return view('layouts.web');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran');

Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');

Route::get('/input-pelanggaran', [PelanggaranController::class, 'view_input'])->name('input-pelanggaran');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


