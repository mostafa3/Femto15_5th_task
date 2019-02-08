<?php

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/inventories', 'InventoryController');
Route::resource('/inventory_managers', 'InventoryManagerController');
Route::resource('/suppliers', 'SupplierController');
Route::resource('/items', 'ItemController');


Route::get('transactions','TransactionController@index');
Route::get('transactions/create','TransactionController@create');
Route::post('transactions','TransactionController@store');
