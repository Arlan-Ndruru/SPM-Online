<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboards\DashboardDistrictController;
use App\Http\Controllers\Dashboards\DashboardMosqueController;
use App\Http\Controllers\Dashboards\DashboardMustahikController;
use App\Http\Controllers\Dashboards\DashboardUserController;
use App\Http\Controllers\MustahikController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});


// todo :: Route Managed mustahik oleh mustahik !
Route::group(['middleware' => ['auth', 'role:Calon-Mustahik']], function () {
    Route::get('/dashboard/bymustahiks/checkSlug', [DashboardController::class, 'checkSlug']);
    Route::post('/dashboard/bymustahiks/', [DashboardController::class, 'store'])->name('storebyMustahiks');
    Route::delete('/dashboard/bymustahiks/{mustahik:slug}', [DashboardController::class, 'destroy'])->name('dashdeletebyMustahik');
    Route::put('/dashboard/bymustahiks/{mustahik:slug}', [DashboardController::class, 'update'])->name('dashupdatebyMustahik');
    Route::get('/dashboard/bymustahiks/{mustahik:slug}/edit', [DashboardController::class, 'edit'])->name('dasheditbyMustahik');
});

// todo :: Route Managed Users !
Route::group(['middleware' => ['auth', 'role:Admin|Ketua|Staf-Resepsionis']], function () {
    Route::get('/dashboard/users/', [DashboardUserController::class, 'index'])->name('dashUsers');
    Route::get('/dashboard/users/create', [DashboardUserController::class, 'create'])->name('dashUserAdd');
    Route::get('/dashboard/users/checkSlug', [DashboardUserController::class, 'checkSlug']);
    Route::post('/dashboard/users/', [DashboardUserController::class, 'store'])->name('dashUserStore');
    Route::delete('/dashboard/users/{user:email}', [DashboardUserController::class, 'destroy'])->name('dashUserDelete');
    Route::get('/dashboard/users/{user:email}', [DashboardUserController::class, 'show'])->name('dashUserShow');
    Route::put('/dashboard/users/{user:email}', [DashboardUserController::class, 'update'])->name('dashUserUpdate');
    Route::get('/dashboard/users/{user:email}/edit', [DashboardUserController::class, 'edit'])->name('dashUserEdit');
});

// todo :: Route Managed Mosque !
Route::group(['middleware' => ['auth', 'role:Admin|Ketua|Staf-Resepsionis']], function () {
    Route::get('/dashboard/mosques/', [DashboardMosqueController::class, 'index'])->name('dashMosques');
    Route::get('/dashboard/mosques/create', [DashboardMosqueController::class, 'create'])->name('dashMosqueAdd');
    Route::get('/dashboard/mosques/checkSlug', [DashboardMosqueController::class, 'checkSlug']);
    Route::post('/dashboard/mosques/', [DashboardMosqueController::class, 'store'])->name('dashMosqueStore');
    Route::delete('/dashboard/mosques/{mosque:slug}', [DashboardMosqueController::class, 'destroy'])->name('dashMosqueDelete');
    Route::get('/dashboard/mosques/{mosque:slug}', [DashboardMosqueController::class, 'show'])->name('dashMosqueShow');
    Route::put('/dashboard/mosques/{mosque:slug}', [DashboardMosqueController::class, 'update'])->name('dashMosqueUpdate');
    Route::get('/dashboard/mosques/{mosque:slug}/edit', [DashboardMosqueController::class, 'edit'])->name('dashMosqueEdit');
});

// todo :: Route Managed District !
Route::group(['middleware' => ['auth', 'role:Admin|Ketua']], function () {
    Route::get('/dashboard/districts/', [DashboardDistrictController::class, 'index'])->name('dashDistricts');
    Route::get('/dashboard/districts/create', [DashboardDistrictController::class, 'create'])->name('dashDistrictAdd');
    Route::get('/dashboard/districts/checkSlug', [DashboardDistrictController::class, 'checkSlug']);
    Route::post('/dashboard/districts/', [DashboardDistrictController::class, 'store'])->name('dashDistrictStore');
    Route::delete('/dashboard/districts/{district:slug}', [DashboardDistrictController::class, 'destroy'])->name('dashDistrictDelete');
    Route::get('/dashboard/districts/{district:slug}', [DashboardDistrictController::class, 'show'])->name('dashDistrictShow');
    Route::put('/dashboard/districts/{district:slug}', [DashboardDistrictController::class, 'update'])->name('dashDistrictUpdate');
    Route::get('/dashboard/districts/{district:slug}/edit', [DashboardDistrictController::class, 'edit'])->name('dashDistrictEdit');
});

// todo :: Route Managed Mustahik !
Route::group(['middleware' => ['auth', 'role:Admin|Ketua|Staf-Resepsionis']], function () {
    Route::get('/dashboard/mustahiks/create', [DashboardMustahikController::class, 'create'])->name('dashMustahikAdd');
    Route::post('/dashboard/mustahiks/', [DashboardMustahikController::class, 'store'])->name('dashMustahikStore');
    Route::delete('/dashboard/mustahiks/{mustahik:slug}', [DashboardMustahikController::class, 'destroy'])->name('dashMustahikDelete');
});
Route::group(['middleware' => ['auth', 'role:Admin|Ketua|Staf-Distribusi|Staf-Resepsionis']], function () {
    Route::get('/dashboard/mustahiks/', [DashboardMustahikController::class, 'index'])->name('dashMustahiks');
    Route::get('/dashboard/mustahiks/checkSlug', [DashboardMustahikController::class, 'checkSlug']);
    Route::get('/dashboard/mustahiks/{mustahik:slug}', [DashboardMustahikController::class, 'show'])->name('dashMustahikShow');
    Route::put('/dashboard/mustahiks/{mustahik:slug}', [DashboardMustahikController::class, 'update'])->name('dashMustahikUpdate');
    Route::get('/dashboard/mustahiks/{mustahik:slug}/edit', [DashboardMustahikController::class, 'edit'])->name('dashMustahikEdit');
});


require __DIR__ . '/auth.php';