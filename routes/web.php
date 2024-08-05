<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\CategoryController;
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
        Route::resource('categories', CategoryController::class);
        Route::resource('bundles', BundleController::class);
        Route::controller(AttributeController::class)->group(function () {
            Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');
            Route::get('attributes/create', [AttributeController::class, 'create'])->name('attributes.create');
            Route::post('attributes', [AttributeController::class, 'store'])->name('attributes.store');
        });

        Route::controller(AttributeValueController::class)->group(function () {
            Route::get('attribute-values', [AttributeValueController::class, 'index'])->name('attribute-values.index');
            Route::get('attribute-values/create', [AttributeValueController::class, 'create'])->name('attribute-values.create');
            Route::post('attribute-values', [AttributeValueController::class, 'store'])->name('attribute-values.store');
            Route::get('attribute-values/{attributeValue}', [AttributeValueController::class, 'show'])->name('attribute-values.show');
            Route::get('attribute-values/{attributeValue}/edit', [AttributeValueController::class, 'edit'])->name('attribute-values.edit');
            Route::post('attribute-values/{attributeValue}', [AttributeValueController::class, 'update'])->name('attribute-values.update');
            Route::delete('attribute-values/{attributeValue}', [AttributeValueController::class, 'destroy'])->name('attribute-values.destroy');
        });
    });

    Route::group(['middleware' => ['role:manager']], function () {
        Route::get('/manager', [ManagerController::class, 'index']);
    });

    Route::group(['middleware' => ['role:staff']], function () {
        Route::get('/staff', [StaffController::class, 'index']);
    });
});

require __DIR__ . '/auth.php';
