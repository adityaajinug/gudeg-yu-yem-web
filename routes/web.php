<?php

use App\Http\Controllers\LaporanSalesTransactionController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/pesanan', [WebController::class, 'pesanan'])->name('pesanan');
Route::get('/menu', [WebController::class, 'menu'])->name('menu');
Route::get('/about',  function() {
    return view('about');
})->name('about');
Route::get('/laporan/sales/pdf', [LaporanSalesTransactionController::class, 'export'])
    ->name('laporan.sales.pdf');

Route::post('/form-pesanan', [WebController::class, 'store'])->name('form.pesanan');