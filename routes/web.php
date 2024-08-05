<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin', [AdminController::class, 'index']);
        Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
        Route::get('/orders/charts', [OrderController::class, 'charts'])->name('order.charts');
        Route::get('orders/export', [OrderController::class, 'export']);
        Route::get('orders/search', [OrderController::class, 'search']);
    });

    Route::group(['middleware' => ['role:manager']], function () {
        Route::get('/manager', [ManagerController::class, 'index']);
    });

    Route::group(['middleware' => ['role:staff']], function () {
        Route::get('/staff', [StaffController::class, 'index']);
    });
});

require __DIR__ . '/auth.php';
