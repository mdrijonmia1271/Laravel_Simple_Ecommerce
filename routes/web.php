<?php

use App\Http\Controllers\AllProductController;
use App\Http\Controllers\CategoryControllerCopy;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\ProductPrice;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryControllerCopy;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('category', [CategoryControllerCopy::class, 'index'])->name('category');
Route::get('creategory', [CategoryControllerCopy::class, 'create'])->name('creategory');
Route::post('storeCategory', [CategoryControllerCopy::class, 'store'])->name('add.category');
Route::get('category/edit/{id}', [CategoryControllerCopy::class, 'edit']);
Route::post('add.update/{id}', [CategoryControllerCopy::class, 'update']);
Route::get('/category/delete/{id}', [CategoryControllerCopy::class, 'destroy']);


Route::get('subCategory', [SubCategoryControllerCopy::class, 'index'])->name('sub.Category');
Route::get('addSubCategory', [SubCategoryControllerCopy::class, 'create'])->name('add.subCategory');
Route::post('addsubcategory.form', [SubCategoryControllerCopy::class, 'store'])->name('addsubcategory.form');
Route::get('subCategory/edit/{id}', [SubCategoryControllerCopy::class, 'edit']);
Route::post('subCategory/update/{id}', [SubCategoryControllerCopy::class, 'update']);
Route::get('subCategory/delete/{id}', [SubCategoryControllerCopy::class, 'destroy']);



Route::get('colorIndex', [ColorController::class, 'colorIndex'])->name('color.index');
Route::get('add.color', [ColorController::class, 'addColored'])->name('add.color');
Route::post('addColor.Form', [ColorController::class, 'addColoredForm'])->name('addColor.Form');
Route::get('color/edit/{id}', [ColorController::class, 'colorEdit']);
Route::post('/color/update/{id}', [ColorController::class, 'colorEdited']);
Route::get('color/delete/{id}', [ColorController::class, 'deleted']);


Route::get('sizeIndex', [SizeController::class, 'sizeIndex'])->name('size.index');
Route::get('add.size', [SizeController::class, 'addSizes'])->name('add.size');
Route::post('addSize.form', [SizeController::class, 'addSizeFormed'])->name('addSize.form');
Route::get('size/edit/{id}', [SizeController::class, 'sizeEdit']);
Route::post('size/update/{id}', [SizeController::class, 'sizeEdited']);
Route::get('size/delete/{id}', [SizeController::class, 'delete']);



Route::get('packet/index', [PacketController::class, 'packetIndex'])->name('packet.index');
Route::get('add.packet', [PacketController::class, 'addPacket'])->name('add.packet');
Route::post('add.packet.form', [PacketController::class, 'addPacketForm'])->name('add.packet.form');
Route::get('/packet/edit/{id}', [PacketController::class, 'packetEdit']);
Route::post('/packet/update/{id}', [PacketController::class, 'packetEdited']);
Route::get('packet/delete/{id}', [PacketController::class, 'delete']);


Route::get('product/index', [AllProductController::class, 'index'])->name('product.index');
Route::get('add/product', [AllProductController::class, 'create'])->name('add.product');
Route::post('add/productForm', [AllProductController::class, 'store'])->name('add.productForm');
Route::get('product/edit/{id}', [AllProductController::class, 'edit']);
Route::post('product/update/{id}', [AllProductController::class, 'update']);
Route::get('product/delete/{id}', [AllProductController::class, 'detele']);


Route::post('product/price',[ProductPriceController::class, 'create']);
Route::post('product/price/{id}', [ProductPriceController::class, 'update']);

require __DIR__.'/auth.php';
