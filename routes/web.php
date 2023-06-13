<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreCategoryController;
use App\Http\Controllers\StoreController;
use App\Models\Item;
use App\Models\Store;
use App\Models\StoreCategory;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashbord.dashboard');



})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// City--routes
Route::get('/city',[CityController::class,'city'])->name('city');
Route::post('/add-city',[CityController::class,'addcity'])->name('city.add');
Route::get('/toggle-city/{id}',[CityController::class,'togglecity'])->name('city.toggle');
Route::get('/delete-city/{id}',[CityController::class,'deletecity'])->name('city.delete');
Route::post('/edit-city',[CityController::class,'editcity'])->name('city.edit');



// Store category--routes
Route::get('/store-category',[StoreCategoryController::class,'store_category'])->name('store_category');
Route::post('/add-store-category',[StoreCategoryController::class,'addStorecategory'])->name('Storestorecategory.add');
Route::get('/toggle-store-category/{id}',[StoreCategoryController::class,'toggleStorecategory'])->name('Storestorecategory.toggle');
Route::post('/edit-store-category',[StoreCategoryController::class,'editStorecategory'])->name('Storestorecategory.edit');
Route::get('/delete-store-category/{id}',[StoreCategoryController::class,'deletestorecategory'])->name('Storestorecategory.delete');


// Store--routes
Route::get('/view-store',[StoreController::class,'store'])->name('admin.store');
Route::get('/add-store',[StoreController::class,'addStore'])->name('Store.add');
Route::post('/update-store',[StoreController::class,'updateStore'])->name('Stores.update');
Route::get('/store-delete/{id}',[StoreController::class,'deleteStore'])->name('Stores.delete');
Route::get('/edit-store/{id}',[StoreController::class,'editstore'])->name('store.edit');
Route::post('/store-updated',[StoreController::class,'storeupdated'])->name('storeupdated');




// Item--routes
Route::get('/view-item',[ItemController::class,'item'])->name('admin.item');
Route::post('/add-item',[ItemController::class,'addItem'])->name('Item.add');
Route::get('/toggle-item/{id}',[ItemController::class,'toggleItem'])->name('Item.toggle');
Route::get('/delete-store/{id}',[ItemController::class,'deleteItem'])->name('Item.delete');
Route::get('/edit-item/{id}',[ItemController::class,'edititem'])->name('item.edit');
Route::post('/update-item',[ItemController::class,'updateitem'])->name('updateitem');


// Item-category
Route::get('/view-itemcategory',[ItemCategoryController::class,'itemcategory'])->name('admin.itemcategory');
Route::get('/add-itemcategory',[ItemCategoryController::class,'additemCategory'])->name('admin.additemCategory');




// data-table
Route::get('/city-datatable', [DatatableController::class, 'cityDatatable'])->name('cityDatatable');
Route::get('/store-category-datatable', [DatatableController::class, 'storecategoryDatatable'])->name('storecategoryDatatable');
Route::get('/store-datatable', [DatatableController::class, 'storeDatatable'])->name('storeDatatable');
Route::get('/item-datatable', [DatatableController::class, 'itemDatatable'])->name('itemDatatable');
Route::get('/itemcategory-datatable', [DatatableController::class, 'itemcategorieDatatable'])->name('itemcategorieDatatable');
