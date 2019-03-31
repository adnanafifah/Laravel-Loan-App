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

// Page Request
Route::get('/', 'LoanController@show');
Route::get('edit/{id}', 'LoanController@edit');
Route::get('view/{id}', 'LoanController@view');
Route::get('add', 'LoanController@add');

// API Calls
Route::post('insert', 'LoanController@insert');
Route::post('update/{id}', 'LoanController@update');
Route::get('delete/{id}', 'LoanController@delete');
Route::get('download/{id}', 'LoanController@download');