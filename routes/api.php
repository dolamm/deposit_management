<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BcDoanhSoController;
use App\Http\Controllers\BcSLSoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bc-doanh-so', [BcDoanhSoController::class, 'bcngay']);
Route::get('/bc-doanh-so-thang', [BcDoanhSoController::class, 'bcthang']);
Route::get('/bc-sl-so', [BcSLSoController::class, 'bcngay']);