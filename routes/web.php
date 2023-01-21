<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\gudangController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\karyawanController;

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
    return view('mainView');
});

//Khusus Ajax
Route::get('loadData/{table}', [Controller::class, 'fetchData']);
Route::get('loadData/{table}/{col}/{identifier}', [Controller::class, 'fetchWhere']);
Route::get('loadData/{table}/{table2}/{id}/{id2}/{col}/{identifier}', [Controller::class, 'fetchJoinWhere']);
Route::get('loadFilteredData/{table}/{where}/{param1}/{param2}', [Controller::class, 'fetchFilterData']);

//Login Logout
Route::get('/login', [loginController::class, 'login']);
Route::post('/login/auth', [loginController::class, 'actionlogin']);

Route::get('/logout', [loginController::class, 'logout']);

//Registrasi
Route::get('/register/{name}/{email}/{password}/{role}', [loginController::class, 'postregistrasi']);

//Personalize Account
Route::get('/account', [accountController::class, 'account'])->middleware('checkRole:admin,gudang,operator');
Route::post('/account/uploadimage', [accountController::class, 'uploadimage'])->middleware('checkRole:admin,gudang,operator');

//Gudang
Route::get('/gudang', [gudangController::class, 'gudang'])->middleware('checkRole:admin,gudang');
Route::post('/gudang/add/{total}', [gudangController::class, 'add'])->middleware('checkRole:admin,gudang');
Route::get('/gudang/adddetil/{order_id}/{brg_id}/{nama}/{jumlah}/{harga}/{subtotal}', [gudangController::class, 'adddetil'])->middleware('checkRole:admin,gudang');

//Master
    //Inventory
Route::get('/inventory', [inventoryController::class, 'inventory'])->middleware('checkRole:admin');
Route::post('/inventory/add', [inventoryController::class, 'add'])->middleware('checkRole:admin');
Route::get('/inventory/delete/{id}', [inventoryController::class, 'delete'])->middleware('checkRole:admin');
Route::post('/inventory/update/{id}', [inventoryController::class, 'update'])->middleware('checkRole:admin');
    //Karyawan
Route::get('/karyawan', [karyawanController::class, 'karyawan'])->middleware('checkRole:admin');
Route::post('/karyawan/add', [karyawanController::class, 'add'])->middleware('checkRole:admin');
Route::get('/karyawan/delete/{id}', [karyawanController::class, 'delete'])->middleware('checkRole:admin');
Route::post('/karyawan/update/{id}', [karyawanController::class, 'update'])->middleware('checkRole:admin');
    //Supplier
Route::get('/supplier', [supplierController::class, 'supplier'])->middleware('checkRole:admin');
Route::post('/supplier/add', [supplierController::class, 'add'])->middleware('checkRole:admin');
Route::get('/supplier/delete/{id}', [supplierController::class, 'delete'])->middleware('checkRole:admin');
Route::post('/supplier/update/{id}', [supplierController::class, 'update'])->middleware('checkRole:admin');

//Transaksi
    //Penjualan
Route::get('/penjualan', [transaksiController::class, 'penjualan'])->middleware('checkRole:admin,operator');
    //Pembelian
Route::get('/pembelian', [transaksiController::class, 'pembelian'])->middleware('checkRole:admin,operator');
