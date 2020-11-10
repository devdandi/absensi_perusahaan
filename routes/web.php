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
    Route::group(['prefix' => 'admin/'], function() {
        Route::get('/','AdminController@index')->name('admin.home');
        Route::get('/get-count-employee', 'RequestController@getCountEmployee')->name('request.getCountEmployee');
        Route::get('/karyawan','KaryawanController@index')->name('karyawan.lihat');
        Route::get('/karyawan/tambah','KaryawanController@showForm')->name('karyawan.tambah');
        Route::post('/karyawan/tambah','KaryawanController@create')->name('karyawan.create');
        Route::post('/karyawan/delete/{id}', 'KaryawanController@destroy')->name('karyawan.delete');
        Route::post('/karyawan/cari', 'KaryawanController@cari')->name('karyawan.cari');
        Route::get('/karyawan/checknik/{nik}', 'RequestController@checknik')->name('check.nik');
    });
});
