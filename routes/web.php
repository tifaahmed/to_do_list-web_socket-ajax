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
    return redirect('/task');
});
Route::name('task.')->prefix('/task')->group( fn ( ) : array => [
    Route::get('/'                          ,   'TaskController@all'            )->name('all'),
    Route::get('/collection'                ,   'TaskController@collection'     )->name('collection'),
    Route::post(''                          ,   'TaskController@store'          )->name('store'),
    Route::post('/{id}/update'              ,   'TaskController@update'         )->name('update'),
    Route::DELETE('/{id}'                   ,   'TaskController@destroy'        )->name('destroy'),
]);

