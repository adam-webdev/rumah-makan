<?php

use App\Http\Controllers\{BarangController,Barang_KeluarController,Barang_MasukController,DashboardController, LaporanController, UserController,Perusahaan};
use Illuminate\Support\Facades\Route;
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
    return view('auth.login');
});

Auth::routes();
Route::get('/dashboard',[DashboardController::class,"index"])->name('dashboard');
// hanya admin yang dapat akses route ini
Route::middleware('auth','role:admin')->group(function(){
    Route::resource('/user', UserController::class);
    Route::get('/user/hapus/{id}',[UserController::class, "delete"]);
    Route::get('/laporan/barang-masuk/',[LaporanController::class,"view_barang_masuk"])->name('laporan.barang_masuk');
    Route::post('/laporan/barang-masuk/',[LaporanController::class,"barang_masuk"])->name('laporan.barang_masuk');
    Route::get('/laporan/barang-keluar/',[LaporanController::class,"view_barang_keluar"])->name('laporan.barang_keluar');
    Route::post('/laporan/barang-keluar/',[LaporanController::class,"barang_keluar"])->name('laporan.barang_keluar');
    Route::get('/barang/hapus/{id}', [BarangController::class, "delete"]);
});
Route::resource('/barang', BarangController::class);
Route::resource('/barang_masuk', Barang_MasukController::class);
Route::get('/barang_masuk/hapus/{id}', [Barang_MasukController::class, "delete"]);
Route::resource('/barang_keluar', Barang_KeluarController::class);
Route::get('/barang_keluar/hapus/{id}', [Barang_KeluarController::class, "delete"]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pengaturan', [Perusahaan::class, "edit"]);
Route::post('/pengaturan', [Perusahaan::class, "update"]);

