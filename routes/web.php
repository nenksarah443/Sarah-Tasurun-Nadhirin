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



Auth::routes();

Route::match(['get','post'],'/register', function(){
	return "Not Found! error 404.";
});

Route::group(['middleware' => ['auth']], function () {
	
	Route::get('/', function () {
    	return view('pages.home');
	})->name('home');

	Route::get('/home', function () {
    	return view('pages.home');
	});

	Route::get('/sample', function() {
		return view('pages.sample');
	});

	Route::prefix('/pengguna')->group(function(){

		Route::group(['middleware'=>['admin']], function(){
			Route::get('/','PenggunaControl@data')->name('pengguna.data');
			Route::get('/tambah','PenggunaControl@tambah')->name('pengguna.tambah');
			Route::post('/tambah','PenggunaControl@simpan')->name('pengguna.simpan');
			Route::get('/hapus/{id}','PenggunaControl@hapus')->name('pengguna.hapus');
			Route::get('/edit/{id}','PenggunaControl@edit')->name('pengguna.edit');
			Route::post('/edit','PenggunaControl@update')->name('pengguna.update');
			Route::get('/report','PenggunaControl@buat')->name('pengguna.report');
			Route::post('/report','PenggunaControl@render')->name('pengguna.render');
		});
		
		
		Route::get('/setting','PenggunaControl@setting')->name('pengguna.setting');
		Route::post('/setting','PenggunaControl@settingUpdate')->name('pengguna.setting.update');
	});

	Route::prefix('/customer')->group(function(){
			Route::get('/','CustomerControl@data')->name('customer.data');
			Route::get('/tambah','CustomerControl@tambah')->name('customer.tambah');
			Route::post('/tambah','CustomerControl@simpan')->name('customer.simpan');
			Route::get('/hapus/{id}','CustomerControl@hapus')->name('customer.hapus');
			Route::get('/edit/{id}','CustomerControl@edit')->name('customer.edit');
			Route::post('/edit','CustomerControl@update')->name('customer.update');
			Route::get('/report','CustomerControl@buat')->name('customer.report');
			Route::post('/report','CustomerControl@render')->name('customer.render');
	});

	Route::prefix('/transportation-type')->group(function() {

			Route::group(['middleware'=>['admin']], function(){
			Route::get('/','TransportationTypeControl@data')->name('transportation-type.data');
			Route::get('/tambah','TransportationTypeControl@tambah')->name('transportation-type.tambah');
			Route::post('/tambah','TransportationTypeControl@simpan')->name('transportation-type.simpan');
			Route::get('/hapus/{id}','TransportationTypeControl@hapus')->name('transportation-type.hapus');
			Route::get('/edit/{id}','TransportationTypeControl@edit')->name('transportation-type.edit');
			Route::post('/edit','TransportationTypeControl@update')->name('transportation-type.update');
			Route::get('/report','TransportationTypeControl@buat')->name('transportation-type.report');
			Route::post('/report','TransportationTypeControl@render')->name('transportation-type.render');
		});

	});


	Route::prefix('/transportation')->group(function() {

			Route::group(['middleware'=>['admin']], function(){
			Route::get('/','TransportationControl@data')->name('transportation.data');
			Route::get('/tambah','TransportationControl@tambah')->name('transportation.tambah');
			Route::post('/tambah','TransportationControl@simpan')->name('transportation.simpan');
			Route::get('/hapus/{id}','TransportationControl@hapus')->name('transportation.hapus');
			Route::get('/edit/{id}','TransportationControl@edit')->name('transportation.edit');
			Route::post('/edit','TransportationControl@update')->name('transportation.update');
			Route::get('/report','TransportationControl@buat')->name('transportation.report');
			Route::post('/report','TransportationControl@render')->name('transportation.render');
		});

	});


	Route::prefix('/rute')->group(function() {

			Route::group(['middleware'=>['admin']], function(){
			Route::get('/','RuteControl@data')->name('rute.data');
			Route::get('/tambah','RuteControl@tambah')->name('rute.tambah');
			Route::post('/tambah','RuteControl@simpan')->name('rute.simpan');
			Route::get('/hapus/{id}','RuteControl@hapus')->name('rute.hapus');
			Route::get('/edit/{id}','RuteControl@edit')->name('rute.edit');
			Route::post('/edit','RuteControl@update')->name('rute.update');
			
		});

	});


	Route::prefix('/jadwal')->group(function() {

			Route::group(['middleware'=>['admin']], function(){
			Route::get('/','JadwalControl@data')->name('jadwal.data');
			Route::get('/tambah','JadwalControl@tambah')->name('jadwal.tambah');
			Route::post('/tambah','JadwalControl@simpan')->name('jadwal.simpan');
			Route::get('/hapus/{id}','JadwalControl@hapus')->name('jadwal.hapus');
			Route::get('/edit/{id}','JadwalControl@edit')->name('jadwal.edit');
			Route::post('/edit','JadwalControl@update')->name('jadwal.update');
			Route::get('/report','JadwalControl@buat')->name('jadwal.report');
			Route::post('/report','JadwalControl@render')->name('jadwal.render');
			
		});

	});



	Route::prefix('/reservation')->group(function() {

			
			Route::get('/','ReservationControl@data')->name('reservation.data');
			Route::get('/pesan/{id_customer}/{id_type}',
						'ReservationControl@pesan')->name('reservation.pesan');
			Route::post('/tambah','ReservationControl@simpan')->name('reservation.simpan');
			Route::post('/batal','ReservationControl@batal')->name('reservation.batal');
			
			
	});

	Route::prefix('/report')->group(function() {
		
		Route::get('/invoice/{kode}','ReportControl@invoice')->name('invoice');
		Route::group(['middleware'=>['admin']], function(){
			Route::get('/','ReportControl@buat')->name('report');
			Route::post('/','ReportControl@render')->name('report.render');
		});
	});




});