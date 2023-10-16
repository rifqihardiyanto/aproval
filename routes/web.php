<?php

use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\DashboardMemberController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function(){
    
});

// auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('login_member', [AuthController::class, 'login_member'])->name('login_member');
Route::get('/logout/member', [AuthController::class, 'logout_member']);
Route::post('login_member', [AuthController::class, 'login_member_action']);

Route::get('dashboard/member', [DashboardMemberController::class, 'index'])->name('dashboard-member')->middleware('member');


// konfirmasi pengajuan
Route::get('/pengajuan/operasional', [OrderController::class, 'list'])->middleware('operasional');
Route::get('/pengajuan/keuangan', [OrderController::class, 'list_2'])->middleware('keuangan');
Route::get('/pengajuan/admin', [OrderController::class, 'list_3'])->middleware('admin');
Route::get('/pengajuan/selesai', [OrderController::class, 'list_4']);
Route::get('/exportpdf', [OrderController::class, 'exportpdf']);
Route::get('/pengajuan/tolak', [OrderController::class, 'list_tolak']);

// 
Route::get('/data/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
Route::get('/pengajuan', [PengajuanController::class, 'view_pengajuan']);
Route::post('/pengajuan/store', [PengajuanController::class, 'store']);



Route::get('/dashboard', [DashboardController::class, 'index']);

// Laporan
Route::get('/laporan', [ReportController::class, 'index']);


