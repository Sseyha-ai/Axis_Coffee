<?php

use App\Http\Controllers\admin\User_listController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PositionController as ControllersPositionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatusController;
use App\Models\Category;
use App\Models\Position;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Types\Relations\Role;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // All protected routes here
    // user route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('edit-user/{id}', [User_listController::class, 'edit'])->name('edit-user');
    Route::post('update-user/{id}', [User_listController::class, 'update'])->name('update-user');
    Route::get('delete-delete/{id}', [User_listController::class, 'destroy'])->name('delete-user');
    Route::get('user-list', [User_listController::class, 'index'])->name('user-list');

    // position

    Route::get('create-position', [PositionController::class, 'create'])->name('create-position');
    Route::post('position', [PositionController::class, 'store'])->name('store-position');
    Route::get('edit-position/{id}', [PositionController::class, 'edit'])->name('edit-position');
    Route::post('update-position/{id}', [PositionController::class, 'update'])->name('update-position');
    Route::get('delete-position/{id}', [PositionController::class, 'destroy'])->name('delete-position');
    Route::get('position-list', [PositionController::class, 'index'])->name('position-list');

    //status 

    Route::get('status-list', [StatusController::class, 'index'])->name('status-list');
    Route::get('create-status', [StatusController::class, 'create'])->name('create-status');
    Route::post('store', [StatusController::class, 'store'])->name('store-status');
    Route::get('edit-status/{id}', [StatusController::class, 'edit'])->name('edit-status');
    Route::post('update-status/{id}', [StatusController::class, 'update'])->name('update-status');
    Route::get('delete-status/{id}', [StatusController::class, 'destroy'])->name('delete-status');

    // category

    Route::get('category-list', [CategoryController::class, 'index'])->name('category-list');
    Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
    //Route::post('store', [CategoryController::class, 'store'])->name('store-category');
    Route::post('store-category', [CategoryController::class, 'store'])->name('store-category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::post('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');
    //product

    Route::get('product-list', [ProductController::class, 'index'])->name('product-list');
    Route::get('filter-product', [ProductController::class, 'filter'])->name('filter-product');
    Route::get('create-product', [ProductController::class, 'create'])->name('create-product');
    Route::post('store', [ProductController::class, 'store'])->name('store-product');
    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::post('update-product/{id}', [ProductController::class, 'update'])->name('update-product');
    //order 

    Route::get('order-list', [OrderController::class, 'index'])->name('order-list');
    Route::post('/order/{type}', [OrderController::class, 'processOrder'])->name('order.process');

    // Other routes...

    //report route


    Route::get('report/user/pdf-preview', [ReportController::class, 'preview'])->name('report-user');
    Route::get('report/user/pdf-download', [ReportController::class, 'downloadPDF'])->name('download-report');
    Route::get('report/user/pdf-print', [ReportController::class, 'printPDF'])->name('print-report');
});
