<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ShippingCompanyController;

use App\Http\Livewire\Product;
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

//Route::get('/', function () {
//    return view('home');
//});
//Route::get('qr-code-g', function () {
//    \QrCode::size(500)
//        ->format('png')
//        ->generate('www.google.com', public_path('images/qrcode.png'));
//    return view('qrCode');
//});
//Route::get('/lang/{lang}', [LocalizationController::class, 'changeLang'])->name('lang.change');
Route::get('change-lang/{lang}', [LocalizationController::class, 'changeLang'])->name('change-lang');

Route::group(['middleware' => 'Localization'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();

//Route::post('/register/register', [UserController::class, 'register' ]) ->name('register');
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/home/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::get('/', [FinancialController::class, 'index'])->name('home');
        Route::get('/product', [ProductController::class, 'index'])->name('product-index');
        Route::get('/product/show', [ProductController::class, 'show'])->name('product-show');
        Route::get('/product/new', [ProductController::class, 'new'])->name('product-new');
        Route::post('/product/add', [ProductController::class, 'add'])->name('product-add');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
        Route::post('/product/update', [ProductController::class, 'update'])->name('product-update');
        Route::post('/product/delete', [ProductController::class, 'delete'])->name('product-delete');
        Route::post('/order/add', [OrderController::class, 'add'])->name('order-add');
        Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order-edit');
        Route::post('/order/update', [OrderController::class, 'update'])->name('order-update');
        Route::post('/order/delete', [OrderController::class, 'delete'])->name('order-delete');
        Route::get('/order/new', [OrderController::class, 'new'])->name('order-new');
        Route::get('/order/index', [OrderController::class, 'index'])->name('order-index');
        Route::get('/customer/new', [CustomerController::class, 'new'])->name('customer-new');
        Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer-update');
        Route::post('/customer/delete', [CustomerController::class, 'delete'])->name('customer-delete');
        Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer-index');
        Route::get('/customer/orders/{id}', [CustomerController::class, 'show'])->name('customer-orders');
        Route::post('/customer/add', [CustomerController::class, 'add'])->name('customer-add');
        Route::get('shipping/company/index', [ShippingCompanyController::class, 'index'])->name('company-index');
        Route::get('shipping/company/new', [ShippingCompanyController::class, 'new'])->name('company-new');
        Route::post('shipping/company/add', [ShippingCompanyController::class, 'add'])->name('company-add');
        Route::post('shipping/company/update', [ShippingCompanyController::class, 'update'])->name('company-update');
        Route::post('shipping/company/delete', [ShippingCompanyController::class, 'delete'])->name('company-delete');
        Route::post('shipping/shipment/delivered', [ShipmentController::class, 'delivered'])->name('delivered_order');
        Route::get('shipping/shipment/new/{id}', [ShipmentController::class, 'new'])->name('shipment-new');
        Route::post('shipping/shipment/add', [ShipmentController::class, 'add'])->name('shipment-add');
        Route::get('shipping/shipment/index', [ShipmentController::class, 'index'])->name('shipment-index');
        Route::get('/products/category/index', [CategoryController::class, 'index'])->name('category-index');
        Route::get('/products/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
        Route::post('/products/category/update', [CategoryController::class, 'update'])->name('category-update');
        Route::post('/products/category/delete', [CategoryController::class, 'delete'])->name('category-delete');
        Route::post('products/category/add', [CategoryController::class, 'add'])->name('category-add');
        Route::get('country/new', [CountryController::class, 'new'])->name('country-new');
        Route::post('country/add', [CountryController::class, 'add'])->name('country-add');
        Route::post('country/update', [CountryController::class, 'update'])->name('country-update');
        Route::get('country/index', [CountryController::class, 'index'])->name('country-index');
        Route::get('financials/revenue', [RevenueController::class, 'index'])->name('revenue-index');
        Route::post('financials/revenue/collect', [RevenueController::class, 'addToTreasury'])->name('revenue-addToTreasury');

//    Route::view('/product/show/{id}', 'livewire.product');

    });
});
