<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\SysConfig;
use App\Http\Livewire\AddPassBook;
use App\Http\Controllers\RouteController;
use App\Models\Route as RouteModel;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BcDoanhSoController;
use App\Http\Controllers\BcSLSoController;
use App\Http\Livewire\UpdateProfile;
use App\Http\Livewire\UserPassbook;
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

Route::get('/add-pass-book/{id}', AddPassBook::class)->name('add-passbook');
Route::get('/update-profile/{id}', UpdateProfile::class)->name('update-profile');
Route::get('/user-passbook/{id}', UserPassbook::class)->name('user-passbook');
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

Route::prefix('api')->group(function () {
    Route::get('/bien-dong-so-du', [AccountController::class, 'BienDongSoDu']);
    Route::get('/account-detail', [AccountController::class, 'TongTaiSan']);
    Route::get('/bc-doanh-so', [BcDoanhSoController::class, 'bcngay']);
    Route::get('/bc-doanh-so-thang', [BcDoanhSoController::class, 'bcthang']);
    Route::get('/bc-sl-so', [BcSLSoController::class, 'bcngay']);
    Route::get('/bc-sl-so-thang', [BcSLSoController::class, 'bcthang']);
    Route::get('/bc-doanh-so-tong-quan-ngay', [BcDoanhSoController::class, 'bctongquanngay']);
});
