<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes-koneks', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e) {
        return "DB gagal connect: " . $e->getMessage();
    }
})->withoutMiddleware('web');

Route::middleware('auth')->group(function () {
    Route::get('/daftarObat', [ObatController::class, 'daftar'])->name('obat.daftar');
    Route::get('/tambahObat', [ObatController::class, 'tambah'])->name('obat.tambah');
    Route::post('/simpanObat', [ObatController::class, 'simpan'])->name('obat.simpan');
    Route::get('/editObat/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/updateObat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/hapusObat/{id}', [ObatController::class, 'hapus'])->name('obat.hapus');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');