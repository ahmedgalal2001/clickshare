<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LivewireOrderController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use  App\Http\Livewire\OrderManagement;
use App\Http\Livewire\OrderHistory;
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




        Route::get('/livewire/orders/{order}/history', [LivewireOrderController::class, 'history'])->name('livewire.orders.history');
        Route::get('/livewire/orders', [LivewireOrderController::class, 'index'])->name('livewire.orders.index');


        Route::controller(CategoryController::class)->group(function () {
            Route::get('categories', 'index')->name('categories.index');
            Route::get('categories/create', 'create')->name('categories.create');
            Route::post('categories', 'store')->name('categories.store');
            Route::get('categories/{category}',  'show')->name('categories.show');
            Route::get('categories/{category}/edit',  'edit')->name('categories.edit');
            Route::post('categories/{category}', 'update')->name('categories.update');
            Route::delete('categories/{category}', 'destroy')->name('categories.destroy');
        });
        Route::resource('bundles', BundleController::class);

        Route::controller(AttributeController::class)->group(function () {
            Route::get('attributes',  'index')->name('attributes.index');
            Route::get('attributes/create', 'create')->name('attributes.create');
            Route::post('attributes', 'store')->name('attributes.store');
        });

        Route::controller(AttributeValueController::class)->group(function () {
            Route::get('attribute-values', 'index')->name('attribute-values.index');
            Route::get('attribute-values/create', 'create')->name('attribute-values.create');
            Route::post('attribute-values', 'store')->name('attribute-values.store');
            Route::get('attribute-values/{attributeValue}',  'show')->name('attribute-values.show');
            Route::get('attribute-values/{attributeValue}/edit',  'edit')->name('attribute-values.edit');
            Route::post('attribute-values/{attributeValue}', 'update')->name('attribute-values.update');
            Route::delete('attribute-values/{attributeValue}', 'destroy')->name('attribute-values.destroy');
        });
    });

    Route::group(['middleware' => ['role:manager']], function () {
        Route::get('/manager', [ManagerController::class, 'index']);
    });

    Route::group(['middleware' => ['role:staff']], function () {
        Route::get('/staff', [StaffController::class, 'index']);
    });
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

require __DIR__ . '/auth.php';
