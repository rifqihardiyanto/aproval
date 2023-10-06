<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TestimoniController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function(){
    Route::post('admin', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::group([
    'middleware' => 'api'
], function(){
    Route::resources([
        'categories'=> CategoryController::class,
        'subcategories'=> SubcategoryController::class,
        'sliders'=> SliderController::class,
        'products'=> ProductController::class,
        'members'=> MemberController::class,
        'testimonis'=> TestimoniController::class,
        'reviews'=> ReviewController::class,
        'orders'=> OrderController::class
    ]);

Route::get('/pengajuan/operasional', [OrderController::class, 'baru']);
Route::get('/pengajuan/keuangan', [OrderController::class, 'dikonfirmasi_1']);
Route::get('/pengajuan/admin', [OrderController::class, 'dikonfirmasi_2']);
Route::get('/pengajuan/ditolak', [OrderController::class, 'ditolak']);
Route::get('/pengajuan/selesai', [OrderController::class, 'selesai']);


Route::post('/pengajuan/ubah_status/{order}', [OrderController::class, 'ubah_status']);

Route::get('/laporan', [ReportController::class, 'index']);
Route::get('/reports', [ReportController::class, 'get_reports']);
});