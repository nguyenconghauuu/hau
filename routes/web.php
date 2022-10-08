<?php

use App\Http\Controllers\LoginController;
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
    return view('index');
});
Route::prefix('/') ->group(function(){
    Route::get('','Homecontroller@index')->name('index');
    Route::get('login','LoginController@index')->name('login');
    Route::post('login','LoginController@login')->name('login_account');
    Route::get('index','Homecontroller@indexuserview')->name('user.index');
});
