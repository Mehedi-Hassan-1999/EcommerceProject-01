<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::get('/',[EcommerceController::class,'index'])->name('home');
Route::get('/all-product',[EcommerceController::class,'allProduct'])->name('all.product');

Route::get('/product-details/{id}',[EcommerceController::class,'productDetails'])->name('product.details');
Route::post('/add-cart/{id}',[EcommerceController::class,'addCart'])->name('add.cart');
Route::get('/show-cart',[EcommerceController::class,'showCart'])->name('show.cart');
Route::get('/show-order',[EcommerceController::class,'showOrder'])->name('show.order');
Route::post('/remove-cart',[EcommerceController::class,'removeCart'])->name('remove.cart');
Route::get('/cash-order',[EcommerceController::class,'cashOrder'])->name('cash.order');
Route::get('/cancel-order/{id}',[EcommerceController::class,'cancelOrder'])->name('cancel.order');
Route::get('/product-search',[EcommerceController::class,'productSearch'])->name('product.search');



Route::get('/stripe/{total_price}',[EcommerceController::class,'stripe'])->name('stripe');
Route::post('/stripe-post/{total_price}',[EcommerceController::class,'stripePost'])->name('stripe.post');


Route::post('/add-comment',[EcommerceController::class,'addComment'])->name('add.comment');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/redirect',[AdminController::class,'redirect'])->name('redirect')->middleware('auth','verified');



    Route::get('/category',[CategoryController::class,'categoryForm'])->name('category');
    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage.category');
    Route::post('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/delete-category',[CategoryController::class,'deleteCategory'])->name('delete.category');


    Route::get('/brand',[BrandController::class,'brandForm'])->name('brand');
    Route::get('/manage-brand',[BrandController::class,'manageBrand'])->name('manage.brand');
    Route::post('/add-brand',[BrandController::class,'addBrand'])->name('add.brand');
    Route::get('/edit-brand/{id}',[BrandController::class,'editBrand'])->name('edit.brand');
    Route::post('/update-brand',[BrandController::class,'updateBrand'])->name('update.brand');
    Route::post('/delete-brand',[BrandController::class,'deleteBrand'])->name('delete.brand');


    Route::get('/product',[ProductController::class,'product'])->name('product');
    Route::get('/manage-product',[ProductController::class,'manageProduct'])->name('manage.product');
    Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->name('edit.product');
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
    Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete.product');
    Route::get('/search-product',[ProductController::class,'searchProduct'])->name('search.product');


    Route::get('/manage-order',[OrderController::class,'manageOrder'])->name('manage.order');
    Route::get('/delivered/{id}',[OrderController::class,'delivered'])->name('delivered');
    Route::get('/canceled/{id}',[OrderController::class,'canceled'])->name('canceled');
    Route::get('/print-pdf/{id}',[OrderController::class,'printPdf'])->name('print.pdf');
    Route::get('/send-email/{id}',[OrderController::class,'sendEmail'])->name('send.email');
    Route::post('/add-sendMail/{id}',[OrderController::class,'addSendMail'])->name('add.sendMail');
    Route::get('/search-order',[OrderController::class,'searchOrder'])->name('search.order');


});
