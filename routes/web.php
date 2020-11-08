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

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/absent/in','HomeController@in')->name('in');
    Route::get('/home/absent/out','HomeController@out')->name('out');

});

Route::get('/admin/login','Auth\AdminLoginController@index')->name('login.index');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('login.posta');

Route::middleware('auth:admin')->group(function() {
    Route::get('/admin','AdminController@index')->name('admin.home');
    // Route::post('/admin/logout','Auth/AdminLoginController@logout')->name('logout');
});
