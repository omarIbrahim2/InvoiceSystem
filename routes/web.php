<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;

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
Route::middleware('auth')->group(function (){
    Route::get('/' , [MainController::class , 'index']);

    Route::prefix('products')->group(function () {
        Route::get('' , [ProductController::class , "index"])->name('Products');
        Route::get('create' , [ProductController::class , "create"])->name('Products-create');
        Route::post('store' , [ProductController::class , 'store'])->name('Products-store');
    });

    Route::prefix('customers')->group(function(){
        
        Route::get('' , [CustomerController::class , 'index'])->name('Customers');
        Route::get('create' , [CustomerController::class , "create"])->name('Customers-create');
        Route::post('store' , [CustomerController::class , 'store'])->name('Customers-store');
    });


    Route::prefix('invoices')->group(function(){
        
        Route::get('' , [InvoiceController::class , 'index'])->name('Invoices');
        Route::get('create' , [InvoiceController::class , "create"])->name('Invoices-create');
        Route::get('{invoiceId}' , [InvoiceController::class , 'show'])->name('single-invoice');
        Route::post('store' , [InvoiceController::class , 'store'])->name('Invoices-store');
        Route::post('add-product' , [InvoiceController::class , 'AddProduct'])->name('Invoices-add-product');
        Route::delete('remove-product' , [InvoiceController::class , 'DeleteProduct'])->name('Invoice-remove-product');
        Route::post('update-quantity' , [InvoiceController::class , 'updateQuantity'])->name('Invoice-update-quantity');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
