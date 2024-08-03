<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenyakitGejalaController;

use App\Http\Controllers\RiwayatDiagnosaController;

// Public Routes
Route::get('/', [DashboardController::class, 'beranda'])->name('beranda');
Auth::routes();
Route::get('/diagnosa-mandiri', [DiagnosaController::class, 'index'])->name('diagnosa-mandiri');
Route::post('/get-diagnosa', [DiagnosaController::class, 'getDiagnosa'])->name('get-diagnosa');
Route::get('/post/{artikel}', [ArtikelController::class, 'show']);

// Disease Pages
Route::get('/bulging', function () {
    return view('penyakit.penyakit-1');
})->name('bulging');
Route::get('/protusi', function () {
    return view('penyakit.penyakit-2');
})->name('protusi');
Route::get('/sequestrasi', function () {
    return view('penyakit.penyakit-3');
})->name('sequestrasi');
Route::get('/sudah.cetak', [DiagnosaController::class, 'cetak'])->name('sudah.cetak');

// Information Pages
Route::get('/daftar-penyakit', function () {
    return view('belum.daftar-penyakit');
})->name('daftar-penyakit');
Route::get('/tentang-aplikasi', function () {
    return view('belum.tentang-aplikasi');
})->name('tentang-aplikasi');

// Authentication Pages
Route::get('/daftar', function () {
    return view('auth.daftar');
})->name('daftar');
Route::get('/masuk', function () {
    return view('auth.masuk');
})->name('masuk');
Route::get('/login', function () {
    return view('auth.masuk');
})->name('login');

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Admin Routes
    Route::get('/admin', [DashboardController::class, 'admindashboard'])->name('admindashboard');
    Route::get('/admin/data-pengguna', [DashboardController::class, 'dataPengguna'])->name('dataPengguna');
    Route::delete('/admin/data-pengguna/{id}', [DashboardController::class, 'deletePengguna'])->name('admin.data-pengguna.delete');
    Route::post('/admin/data-pengguna', [DashboardController::class, 'storePengguna'])->name('storePengguna');
    Route::put('/admin/data-pengguna/{id}', [DashboardController::class, 'updatePengguna'])->name('updatePengguna');

    // Symptoms and Disease Management
    Route::get('/admin/data-gejala', [DashboardController::class, 'dataGejala'])->name('dataGejala');
    Route::delete('/admin/data-gejala/{id}', [DashboardController::class, 'deleteGejala'])->name('admin.data-gejala.delete');
    Route::post('/admin/data-gejala', [DashboardController::class, 'storeGejala'])->name('storeGejala');
    Route::put('/admin/data-gejala/{kode_gejala}', [DashboardController::class, 'updateGejala'])->name('updateGejala');
    Route::get('/admin/data-penyakit', [DashboardController::class, 'dataPenyakit'])->name('dataPenyakit');
    Route::post('/admin/data-penyakit', [DashboardController::class, 'storePenyakit'])->name('storePenyakit');
    Route::put('/admin/data-penyakit/{kode_penyakit}', [DashboardController::class, 'updatePenyakit'])->name('updatePenyakit');
    Route::delete('/admin/data-penyakit/{kode_penyakit}', [DashboardController::class, 'deletePenyakit'])->name('deletePenyakit');
    Route::get('/admin/data-riwayat-diagnosa', [DashboardController::class, 'riwayatDiagnosa'])->name('riwayat-diagnosa');
    Route::get('/admin/data-diagnosa', [DashboardController::class, 'dataDiagnosa'])->name('dataDiagnosa');
    Route::post('/admin/data-diagnosa/store', [DiagnosaController::class, 'store'])->name('storeDiagnosa');
    Route::put('/admin/data-diagnosa/{kodeDiagnosa}', [DiagnosaController::class, 'update'])->name('updateDiagnosa');
    Route::delete('/admin/data-diagnosa/{kodeDiagnosa}', [DiagnosaController::class, 'destroy'])->name('admin.data-diagnosa.delete');

    //penyakit gejala
    Route::get('/admin/data-penyakit-gejala', [PenyakitGejalaController::class, 'index'])->name('penyakit_gejala.index');
    Route::post('/admin/data-penyakit-gejala', [PenyakitGejalaController::class, 'store'])->name('storePenyakitGejala');
    Route::put('/admin/data-penyakit-gejala/{id}', [PenyakitGejalaController::class, 'update'])->name('updatePenyakitGejala');
    Route::delete('/admin/data-penyakit-gejala/{id}', [PenyakitGejalaController::class, 'destroy'])->name('deletePenyakitGejala');

    // User Profile and History
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/edit-profil', [ProfileController::class, 'index'])->name('profil');
    Route::get('/dashboard', [DashboardController::class, 'riwayatDiagnosaSudah'])->name('riwayat-diagnosa-sudah');
    Route::get('/belum-cek-diagnosa', [DashboardController::class, 'cekDiagnosaBelum'])->name('belum.cek-diagnosa');
    Route::get('/cek-diagnosa', [DashboardController::class, 'cekDiagnosaSudah'])->name('cek-diagnosa');
    Route::post('/proses-diagnosa', [DiagnosaController::class, 'prosesDiagnosa'])->name('proses-diagnosa');
    Route::delete('/riwayat-diagnosa/{id}', [DashboardController::class, 'deleteRiwayatDiagnosa'])->name('deleteRiwayatDiagnosa');
    Route::get('/diagnosa/print/{id}', [DiagnosaController::class, 'printPreview'])->name('diagnosa.print');

    // Route untuk menampilkan PDF hasil diagnosa
    Route::get('/print-diagnosa/{id}', [DiagnosaController::class, 'printDiagnosa'])->name('print-diagnosa');
  
});
