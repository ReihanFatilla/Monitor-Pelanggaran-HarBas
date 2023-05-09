<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori')->middleware('checkLevel:admin');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store')->middleware('checkLevel:admin');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete')->middleware('checkLevel:admin');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.put')->middleware('checkLevel:admin');

    // Users
    Route::get('/users', [HomeController::class, 'index'])->name('users')->middleware('checkLevel:admin');

    // Statistik
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');

    // Pelanggaran
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran')->middleware('checkLevel:admin, siswa');
    Route::get('/input-pelanggaran', [PelanggaranController::class, 'view_input'])->name('input-pelanggaran')->middleware('checkLevel:admin, guru');
    Route::get('/get-nisn', [PelanggaranController::class, 'get_nisn'])->middleware('checkLevel:admin, guru');
    Route::get('/get-nama-by-kelas', [PelanggaranController::class, 'get_nama_by_kelas'])->middleware('checkLevel:admin, guru');
});
