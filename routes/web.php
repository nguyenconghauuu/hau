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

Route::get('', 'Homecontroller@index')->name('index');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::middleware('have-login')->group(function () {
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@login')->name('login_account');
    Route::get('register', 'LoginController@register')->name('register');
    Route::post('register', 'LoginController@registeruser')->name('register_account');
});

Route::prefix('/')->middleware('auth')->group(function () {
    Route::middleware('role.user')->group(function(){
        Route::get('index', 'Homecontroller@indexuserview')->name('user.index');
    });

    Route::prefix('admin')->name('admin.')->middleware('role.admin')->group(function(){
        Route::get('/',function(){
            return redirect()->route('admin.index');
        });
        Route::prefix('user')->group(function(){
            Route::get('','UserController@index')->name('user.index');
            Route::get('/create','UserController@create')->name('user.create');
            Route::post('/create','UserController@store')->name('user.store');
        });
    });
});

