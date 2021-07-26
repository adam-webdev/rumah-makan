<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
Route::resource('/user', UserController::class);
Route::get('/user/hapus/{id}',[UserController::class, "delete"]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');