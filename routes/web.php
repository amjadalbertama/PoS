<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMaster\MasterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Suppliers\SupplierController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Inventory\DistributinController;
use App\Http\Controllers\Inventory\DistributoutController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginController::class)->group(function () {
    Route::post('/loginpost', 'login')->name('loginpost');
    Route::get('/', 'index')->name('login');
});
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        // Route::get('/', 'index')->name('login');
    });
});

//Users/Employeer 
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/add/form', [UserController::class, 'formAddUser']);

//Data Master/Product
Route::get('/datamaster', [MasterController::class, 'index']);
Route::get('/add/datamaster', [MasterController::class, 'addDataMaster']);
Route::get('/add/datamaster/category', [MasterController::class, 'addCategory']);
Route::get('/add/datamaster/unit', [MasterController::class, 'addUnit']);

//suppliers
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/add/suppliers', [SupplierController::class, 'addSuppliers']);

//Sales/Transaction
Route::get('/sales', [SalesController::class, 'index']);
Route::get('/onlinesales', [SalesController::class, 'listOnlineSales']);
Route::get('/stockin', [SalesController::class, 'viewStockIn']);
Route::get('/stockout', [SalesController::class, 'viewStockOut']);
Route::get('/add/stockin', [SalesController::class, 'addStock']);
Route::get('/add/stockout', [SalesController::class, 'outStock']);
Route::get('/report/sales', [SalesController::class, 'reportSales']);


//Inventory
// Dis In
Route::get('/distributin', [DistributinController::class, 'index']);
Route::get('/formadd/distributin', [DistributinController::class, 'formAdd']);
// Dis Out
Route::get('/distributout', [DistributoutController::class, 'index']);
Route::get('/formadd/distributout', [DistributoutController::class, 'formAdd']);


Route::get('/reports/stockin', function () {
    return view('pages.reports.stockin');
});

Route::get('/reports/stock', function () {
    return view('pages.reports.stock');
});

Route::get('/transaction/stock', function () {
    return view('pages.transaction.stock');
});