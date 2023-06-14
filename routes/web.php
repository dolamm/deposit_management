<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\AddPassBook;
use App\Http\Controllers\RouteController;
use App\Models\Route as RouteModel;
use App\Http\Livewire\Profile;
use App\Http\Livewire\TestNe;
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
Route::get('/homepage', function() {
    return view('home');
});
Route::get('/', [HomeController::class, 'index'])->name('root');
//add middleware
Route::get('/{component}', [RouteController::class, 'index']);

Route::get('/test/{id}', AddPassBook::class)->name('show');
// Route::get('/sys-config', [RouteController::class, 'index'])->name('config');
// Route::get('/home', [RouteController::class, 'index'])->name('home');
// Route::get('/list-user', [RouteController::class, 'index'])->name('list-user');
// Route::get('/edit-permission', [RouteController::class, 'index'])->name('edit-permission');

$routes = Cache::rememberForever('routes', function () {
    return RouteModel::all();
});

foreach ($routes as $route) {
    Route::get($route->route, [RouteController::class, 'index'])->name($route->name);
}