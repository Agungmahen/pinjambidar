<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);
Route::get('barangmasuk',[BarangMasukController::class,'index']);
Route::get('tambahbarangmasuk',[BarangMasukController::class,'tambah']);
Route::post('tambahbarangmasukproses',[BarangMasukController::class,'tambahproses']);
Route::get('editbarangmasuk/{id}',[BarangMasukController::class,'edit']);
Route::post('editbarangmasuk/{id}',[BarangMasukController::class,'editproses']);
Route::get('hapusbarangmasuk/{id}',[BarangMasukController::class,'hapus']);
Route::post('/hapus-terpilih-barangmasuk', [BarangMasukController::class, 'hapusTerpilih']);

Route::get('barangkeluar',[BarangKeluarController::class,'index']);
Route::get('tambahbarangkeluar',[BarangKeluarController::class,'add']);
Route::post('tambahbarangkeluar',[BarangKeluarController::class,'addproses']);
Route::get('editbarangkeluar/{id}',[BarangKeluarController::class,'edit']);
Route::post('editbarangkeluar/{id}',[BarangKeluarController::class,'editproses']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_proses']);

Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'registerproses']);  

Route::get('logout', [AuthController::class, 'logout']);