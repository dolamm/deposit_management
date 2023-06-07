<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\SysConfig;
use App\Http\Controllers\RouteController;
use Auth;
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

Auth::routes();
Route::get('/test', function() {
    return view('layouts.admin');
});
Route::get('/', [HomeController::class, 'index'])->name('root');
//add middleware
Route::get('/config/{component}', [RouteController::class, 'index']);
Route::get('/config/sys-config', [RouteController::class, 'index'])->name('config');
Route::get('/config/home', [RouteController::class, 'index'])->name('home');