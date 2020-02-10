<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resources([
    'orders' => 'OrderController',
    'order_details' => 'OrderDetailController',
    'payments' => 'PaymentController',
    'payment_types' => 'PaymentTypeController',
    'products' => 'ProductController',
    'purchase_orders' => 'PurchaseOrderController',
    'roles' => 'RoleController',
    'sale_orders' => 'StockController',
    'stocks' => 'StockController',
    'stock_histories' => 'StockHistoryController'
]);
