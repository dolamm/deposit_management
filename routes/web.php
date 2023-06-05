<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\SettingConfig;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
//add middleware
Route::get('/config', [SettingConfig::class, 'render']);