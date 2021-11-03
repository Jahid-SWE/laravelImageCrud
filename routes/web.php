<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    return 'Home page';
});
Route::get('/all-category',[
     'uses'  => 'App\Http\Controllers\CategoryController@index',
    'as'    =>  'all-category'
]);
Route::get('/add-category',[
    'uses'  => 'App\Http\Controllers\CategoryController@add',
    'as'    =>  'add-category'
]);
Route::post('/new-category',[
    'uses'  => 'App\Http\Controllers\CategoryController@newCategory',
    'as'    =>  'new-category'
]);
Route::get('/edit-category/{id}',[
    'uses'  => 'App\Http\Controllers\CategoryController@edit',
    'as'    =>  'edit-category'
]);
Route::post('/update-category',[
    'uses'  => 'App\Http\Controllers\CategoryController@update',
    'as'    =>  'update-category'
]);
Route::get('/delete-category/{id}',[
    'uses'  => 'App\Http\Controllers\CategoryController@delete',
    'as'    =>  'delete-category'
]);
