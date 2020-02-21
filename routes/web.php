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

Route::get('/', 'ItemController@getDataDisplayItems');

// Add Items
Route::get('add-item', 'ItemController@getPageAddItem');
Route::post('add-item', [
    'as'     => 'addItem',
    'uses'     => 'ItemController@postDataAddItem'
]);

// Update Items
Route::get('update-item/{id}', [
	'as' 	=> 'addItem',
	'uses' 	=> 'ItemController@getDataUpdateItem'
]);
Route::post('update-item/{id}', [
	'as' 	=> 'updateItem',
	'uses' 	=> 'ItemController@postDataUpdateItem'
]);

// Delete Items
Route::get('delete-item/{id}', [
	'as' 	=> 'deteleItem',
	'uses' 	=> 'ItemController@getDataDeteleItem'
]);