<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Hpp\HppController;
use App\Http\Controllers\Invoice\InvoiceController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderItem;
use App\Http\Controllers\Penerimaan\PenerimaanBarang;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Produk\UpdateProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\vendorController;
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
    return view('login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::group(['middleware' => 'cekLogin'], function () {
    Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');
    Route::get('/userWhitelist', [UserController::class, 'WhiteListUser'])->name('user.whitelist');
    Route::get('/product', [ProductController::class, 'index'])->name('inputproduct');
    Route::post('/createProduct', [ProductController::class, 'CreateProduct'])->name('create.product');
    Route::get('/getProduct', [ProductController::class, 'getProduct'])->name('get.product');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/DetailProduk/{id}', [ProductController::class, 'DetailProduk'])->name('detail.product');
    Route::post('/addItemProduct', [ProductController::class, 'addItemProduct'])->name('add.item.product');
    Route::get('/Order', [OrderController::class, 'index'])->name('order');
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/UpdateProduk', [UpdateProdukController::class, 'index'])->name('update');
    Route::get('/UpdateProduk/{id}', [UpdateProdukController::class, 'UpdateProduct'])->name('update.product');
    Route::post('/UpdateProduct', [UpdateProdukController::class, 'UpdateProductDetail'])->name('update.product');
    Route::get('/OrderProduk', [OrderItem::class, 'OrderProduk'])->name('order.produk');
    // json
    Route::get('/ItemProductJson/{id}', [OrderItem::class, 'getProductdetaiitem'])->name('item.product');
    Route::get('/VendorJson/{id}', [OrderItem::class, 'getVendorJson'])->name('vendor.json');
    // json invoice
    Route::get('/InvoiceJson/vendor/{id}', [InvoiceController::class, 'getInvoiceJsonvendor'])->name('invoice.json.vendor');
    Route::get('/ItemInvoice/{id}', [InvoiceController::class, 'getInvoiceItem'])->name('InvoiceItem.json');
    // json hpp
    Route::get('/HppJson/{id}', [HppController::class, 'getHppJson'])->name('hpp.json');
    Route::post('/BuatHpp', [HppController::class, 'BuatHpp'])->name('hpp.create');
    // order
    Route::post('/Oerder-produk', [OrderController::class, 'create'])->name('buatorder');
    // invoice
    Route::post('/Invoice', [InvoiceController::class, 'create'])->name('create.invoice');
    Route::get('/ListInvoice', [InvoiceController::class, 'listInvoice'])->name('ListInvoice');
    // penerimaan baran
    Route::get('/PenerimaanBarang', [PenerimaanBarang::class, 'index'])->name('penerimaan.barang');
    Route::get('/TerimaBarang/{id}', [PenerimaanBarang::class, 'TerimaBarang'])->name('terima.barang');
    // margin
    Route::get('/Margin', [HppController::class, 'Margin'])->name('margin');
});
Route::get('users/', [UserController::class, 'login']);

Route::post('/userlogin', [UserController::class, 'userLogin'])->name('userlogin');
Route::post('/logout', [UserController::class, 'Logout'])->name('logout');
