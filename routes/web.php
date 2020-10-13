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
    return view('home');
});

Route::post('/permit', 'HomeController@permit')->name('permit');
Route::get('/get_type', 'HomeController@getType');
Route::get('/get_name/{name}', 'HomeController@getName');
Route::get('/process/{permit}/{isApprove}', 'HomeController@process_permit');

