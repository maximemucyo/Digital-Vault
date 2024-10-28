<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BroadcastingController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\CryptoToken;

// Authentication Routes
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/admins', [DashboardController::class, 'admins'])->name('admins');
    Route::get('/chart', [ChartController::class, 'chart'])->name('chart');

    // Chart Price Points
    Route::get('/chart/price-points/{symbol}', [ChartController::class, 'pricePoints'])->name('price_points');

    // Admin Routes
    Route::get('/admin{admin}', [AdminController::class, 'admin'])->name('admin');
    Route::get('/settings-admin{admin}', [AdminController::class, 'adminSettings'])->name('admin.settings');
    Route::patch('/update-admin{admin}', [AdminController::class, 'updateAdminDetails'])->name('admin.update');
    Route::put('/update-admin-password{admin}', [AdminController::class, 'updateAdminPassword'])->name('admin.update.password');
    Route::delete('/admin{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // User Routes
    Route::get('/user{user}', [UserController::class, 'user'])->name('user');

    // Profile Settings
    Route::get('/account-settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/user{user}', [BalanceController::class, 'update'])->name('balance.update');

    // Price Point Update Routes
    Route::post('/update-price-point', [ChartController::class, 'pricePointUpdate'])->name('pricePointUpdate');
    Route::post('pricedataupdate', [ChartController::class, 'selectedSymbolData'])->name('pricedataupdate');
    
    // Admin Management
    Route::post('/add_admin', [AdminController::class, 'addAdmin'])->name('add_admin');
});

// Token Routes
Route::get('/tokens', function () {
    $tokens = CryptoToken::pluck('token');
    return response()->json($tokens);
});

// Chart Update Routes
Route::post('/updatesymbol', [BroadcastingController::class, 'updateSymbol']);
Route::post('/update-chart-type', [BroadcastingController::class, 'updateChartType']);

// Email Verification
Route::get('/verify-email/{id}/{hash}/{token}', VerifyEmailController::class)
     ->middleware(['throttle:6,1'])
     ->name('verification.verify');

// Auth Routes
require __DIR__.'/auth.php';