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

Route::view('/','login');
// Route::view('/karyawan','indexkaryawan');
Route::view('/cart','cart');
Route::post("/logcheck","maincontroler@logcheck");
Route::get('/logout',"maincontroler@logout");


//untuk owner

Route::group(['prefix'=>'owner'],function(){
    Route::get('/indexowner','ownercontroler@indexowner');
    Route::get('/listkaryawan','ownercontroler@listkaryawan');
    Route::view('/tambahpegawai',"regispegawai");
    Route::post('/registercheck','ownercontroler@regcheck');
    Route::get('/stokbarang','ownercontroler@cekstok');
    Route::get('/disabledpegawai/{id}','ownercontroler@disablepegawai');
    Route::get('/aktifpegawai/{id}','ownercontroler@aktifpegawai');
    Route::get('/disabledproduk/{id}','ownercontroler@disableproduk');
    Route::get('/aktifproduk/{id}','ownercontroler@aktifproduk');
    Route::get('/hapusproduk/{id}','ownercontroler@hapusproduk');
});

//untuk pegawai
Route::group(['prefix'=> 'pegawai'], function(){
    Route::get('/karyawan','pegawaicontroler@tampilanawal');
});

