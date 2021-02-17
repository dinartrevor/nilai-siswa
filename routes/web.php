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

Route::get('/home', 'HomeController@index')->name('home');
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
  Route::get('/admin/murid/cetak','Admin\SiswaController@cetak')->name('cetak_murid');
   Route::get('/admin/murid/rangking','Admin\SiswaController@rangking')->name('rangking');
   Route::get('/admin/murid/jenis_kelamin','Admin\SiswaController@gender')->name('gender');
   Route::get('/admin/murid/asal_sekolah','Admin\SiswaController@asal_sekolah')->name('asal_sekolah');

  Route::get('/admin/guru','Admin\GuruController@index');
  Route::get('/admin/guru/tambah','Admin\GuruController@create')->name('tambah_guru');
  Route::post('/admin/guru/tambah/add','Admin\GuruController@store')->name('addGuru');
  Route::get('/admin/guru/delete/{guru}','Admin\GuruController@destroy')->name('delete_guru');
  Route::get('/admin/guru/detail/{guru}','Admin\GuruController@show')->name('detail_guru');
  Route::get('/admin/guru/edit/{guru}','Admin\GuruController@edit')->name('edit_guru');
  Route::post('/admin/guru/edit/{guru}/update','Admin\GuruController@update')->name('updateGuru');
  Route::get('/admin/guru/cetak','Admin\GuruController@cetak')->name('cetak_guru');
Route::get('/admin/mapel/cetak-mapel','Admin\GuruController@mapel')->name('mapel');
  Route::get('/admin/kelas','Admin\KelasController@index');
  Route::get('/admin/kelas/tambah','Admin\KelasController@create')->name('tambah_kelas');
  Route::post('/admin/kelas/tambah/add','Admin\KelasController@store')->name('addKelas');
  Route::post('/admin/kelas/tambah/add/jurusan','Admin\KelasController@AddJurusan')->name('AddJurusan');
  Route::get('/admin/kelas/edit-kelas/{kelas}', 'Admin\KelasController@edit');
  Route::post('/admin/kelas/edit-kelas/{kelas}/update', 'Admin\KelasController@update')->name('updateKelas');
  Route::get('/admin/kelas/delete-kelas/{kelas}', 'Admin\KelasController@destroy')->name('hapus-kelas');
  Route::get('/admin/kelas/delete-jurusan/{jurusan}', 'Admin\KelasController@destroyJurusan')->name('hapus-jurusan');
  Route::get('/admin/kelas/cetak','Admin\KelasController@cetak')->name('report_kelas');

  Route::get('/admin/mapel','Admin\MapelController@index');
  Route::get('/admin/mapel/tambah','Admin\MapelController@create')->name('tambah_mapel');
  Route::post('/admin/mapel/tambah/add','Admin\MapelController@store')->name('addMapel');
  Route::get('/admin/mapel/edit-mapel/{mapel}', 'Admin\MapelController@edit');
  Route::post('/admin/mapel/edit-mapel/{mapel}/update', 'Admin\MapelController@update')->name('updateMapel');
  Route::get('/admin/mapel/delete-mapel/{mapel}', 'Admin\MapelController@destroy');
  Route::get('/admin/mapel/cetak','Admin\MapelController@cetak')->name('report_mapel');
  Route::get('/admin/mapel/cetak-guru','Admin\MapelController@guru')->name('guru');
  

  Route::get('/admin/nilai/detail/{murid}','Admin\NilaiController@show')->name('nilai_siswa');
  Route::get('/admin/nilai/detail/cetak/{murid}','Admin\NilaiController@cetak_nilai')->name('cetak_nilai_murid');
  Route::get('/admin/nilai/detail/cetak-ganjil/{murid}','Admin\NilaiController@cetak_nilai_ganjil')->name('cetak_nilai_murid_ganjil');
  Route::get('/admin/nilai/detail/cetak-genap/{murid}','Admin\NilaiController@cetak_nilai_genap')->name('cetak_nilai_murid_genap');
  Route::post('/admin/nilai/tambah-nilai/{murid}','Admin\NilaiController@store')->name('nilai');
  Route::get('/admin/nilai/delete-nilai/{nilai}/{murid}','Admin\NilaiController@destroy')->name('nilai_delete');
  Route::get('/guru/mapel', 'Admin\NilaiController@guruMapel');
  Route::get('/admin/remedial','RemedialController@index');

  Route::get('/admin/remedial/detail/{id}','RemedialController@detail')->name('detail.remedial');
  Route::post('/admin/remedial/detail/{id}','RemedialController@detailUpdate')->name('remedial.update');
});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function () {
  Route::get('/murid', 'Murid\DashboardController@index');
  Route::get('/murid/histori-nilai', 'Murid\NilaiController@index');
  Route::get('/murid/rangking', 'Murid\NilaiController@rangking')->name('rangkingSiswa');
  Route::get('/murid/cetak-nilai','Murid\NilaiController@export_pdf')->name('cetakNilai');
   Route::get('/murid/cetak-nilai/ganjil','Murid\NilaiController@ganjil')->name('ganjil');
   Route::get('/murid/cetak-nilai/genap','Murid\NilaiController@genap')->name('genap');
  Route::get('/murid/edit-profil','Murid\SiswaController@editProfil')->name('editProfil');
  Route::post('/murid/edit-profil/{id}','Murid\SiswaController@editProfilSiswa')->name('editProfileSiswa');
  Route::get('/murid/remedial/{nilai}','RemedialController@remedial_murid')->name('remedial');
  Route::post('/murid/remedial/bukti/{nilai}','RemedialController@bukti_remedial')->name('bukti_remedial');
});