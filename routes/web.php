<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProductsController;
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

/* PRODUCT */
Route::get('/', [ProductsController::class, 'index'])->name('products.index');
Route::post('/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('/details', [ProductsController::class, 'details'])->name('products.details');
Route::get('/update_product', [ProductsController::class, 'view_update_form'])->name('products.form_update');
Route::post('/update', [ProductsController::class, 'update'])->name('products.update');
Route::get('/delete', [ProductsController::class, 'delete'])->name('products.delete');


/* MARCAS */
Route::get('/marcas', [BrandsController::class, 'index'])->name('brands.index');
Route::post('/update_brand', [BrandsController::class, 'update_brand'])->name('brands.update_data');
Route::get('/delete_brand', [BrandsController::class, 'delete_brand'])->name('brands.delete_data');
