<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TestimoniController;
use App\Models\Subcategory;

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


// Route::post('login', [AuthController::class, 'login_member']);
// Route::post('logout', [AuthController::class, 'logout_member']);

// auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

// kategori
Route::get('/kategori', [CategoryController::class, 'list']);
Route::get('/subkategori', [SubcategoryController::class, 'list']);
Route::get('/slider', [SliderController::class, 'list']);
Route::get('/barang', [ProductController::class, 'list']);
Route::get('/testimoni', [TestimoniController::class, 'list']);
Route::get('/review', [ReviewController::class, 'list']);

// pesanan
Route::get('/pengajuan/operasional', [OrderController::class, 'list'])->middleware('operasional');
Route::get('/pengajuan/keuangan', [OrderController::class, 'list_2']);
Route::get('/pengajuan/admin', [OrderController::class, 'list_3']);
Route::get('/pengajuan/selesai', [OrderController::class, 'list_4']);
Route::get('/pengajuan/tolak', [OrderController::class, 'list_tolak']);




Route::get('/dashboard', [DashboardController::class, 'index']);

// Laporan
Route::get('/laporan', [ReportController::class, 'index']);


