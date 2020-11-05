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

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
  // siswa

  // admin
  Route::get('/', 'Admin\DashboardController@index');
  Route::get('/admin/murid','Admin\SiswaController@index');
  Route::get('/admin/murid/tambah','Admin\SiswaController@create')->name('tambah_murid');
  Route::post('/admin/murid/tambah/add','Admin\SiswaController@store')->name('addMurid');
  Route::get('/admin/murid/delete/{murid}','Admin\SiswaController@destroy')->name('deleteMurid');
  Route::get('/admin/murid/detail/{murid}','Admin\SiswaController@show')->name('detailMurid');
  Route::get('/admin/murid/edit-murid/{murid}', 'Admin\SiswaController@edit')->name('editMurid');
  Route::post('/admin/murid/edit-murid/{murid}/update', 'Admin\SiswaController@update')->name('updateMurid');

  Route::get('/admin/guru','Admin\GuruController@index');
  Route::get('/admin/guru/tambah','Admin\GuruController@create')->name('tambah_guru');
  Route::post('/admin/guru/tambah/add','Admin\GuruController@store')->name('addGuru');
  Route::get('/admin/guru/delete/{guru}','Admin\GuruController@destroy')->name('delete_guru');
  Route::get('/admin/guru/detail/{guru}','Admin\GuruController@show')->name('detail_guru');
  Route::get('/admin/guru/edit/{guru}','Admin\GuruController@edit')->name('edit_guru');
  Route::post('/admin/guru/edit/{guru}/update','Admin\GuruController@update')->name('updateGuru');

  Route::get('/admin/kelas','Admin\KelasController@index');
  Route::get('/admin/kelas/tambah','Admin\KelasController@create')->name('tambah_kelas');
  Route::post('/admin/kelas/tambah/add','Admin\KelasController@store')->name('addKelas');
  Route::get('/admin/kelas/edit-kelas/{kelas}', 'Admin\KelasController@edit');
  Route::post('/admin/kelas/edit-kelas/{kelas}/update', 'Admin\KelasController@update')->name('updateKelas');
  Route::get('/admin/kelas/delete-kelas/{kelas}', 'Admin\KelasController@destroy')->name('hapus-kelas');

  Route::get('/admin/mapel','Admin\MapelController@index');
  Route::get('/admin/mapel/tambah','Admin\MapelController@create')->name('tambah_mapel');
  Route::post('/admin/mapel/tambah/add','Admin\MapelController@store')->name('addMapel');
  Route::get('/admin/mapel/edit-mapel/{mapel}', 'Admin\MapelController@edit');
  Route::post('/admin/mapel/edit-mapel/{mapel}/update', 'Admin\MapelController@update')->name('updateMapel');
  Route::get('/admin/mapel/delete-mapel/{mapel}', 'Admin\MapelController@destroy');

  Route::get('/admin/nilai/detail/{murid}','Admin\NilaiController@show')->name('nilai_siswa');
  Route::post('/admin/nilai/tambah-nilai/{murid}','Admin\NilaiController@store')->name('nilai');
  Route::get('/admin/nilai/delete-nilai/{nilai}/{murid}','Admin\NilaiController@destroy')->name('nilai_delete');
  Route::get('/admin/remedial','RemedialController@index');
   Route::get('/admin/remedial/detail','RemedialController@detail');
});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function () {
  Route::get('/murid', 'Murid\DashboardController@index');
  Route::get('/murid/histori-nilai', 'Murid\NilaiController@index');
  Route::get('/murid/cetak-nilai','Murid\NilaiController@export_pdf')->name('cetakNilai');
  Route::get('/murid/remedial/{nilai}','RemedialController@remedial_murid')->name('remedial');
  Route::post('/murid/remedial/bukti/{nilai}','RemedialController@bukti_remedial')->name('bukti_remedial');
});