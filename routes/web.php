<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ui.home');
});
Route::get('/login', function () {
    return view('welcome');
})->name('login');



    // user
    Route::get('akun','UserController@akun');
    Route::resource('user','UserController');




Route::group(['middleware' => ['auth', 'chechkRole:admin,pegawai']],function(){
    // dasbord
    Route::get('dashboard','DasboardContrroller@index');
    Route::post('/suser','UserController@setings');
        // berita
    Route::resource('brita','BritaController');
    // structur desa
    Route::resource('structur','StrukturdesaController');
    // potensi
    Route::resource('potensi','PotensiController');
    // galery
    Route::resource('galery','GaleryController');
    // penduduk
    Route::resource('penduduk','PendudukController');
    Route::post('/ependuduk/import_excel', 'PendudukController@import_excel');

    // pengeluaran
    Route::resource('pengeluaran','PengluaranController');
    Route::post('/epengeluaran/import_excel', 'PengluaranController@import_excel');
    Route::post('/cepengeluaran/cetak_pdf', 'PengluaranController@cetak_pdf');
    // pemasukan
    Route::resource('pemasukan','PemasukanController');

    Route::post('/epemasukan/import_excel', 'PemasukanController@import_excel');
    Route::post('/cepemasukan/cetak_pdf', 'PemasukanController@cetak_pdf');
    Route::resource('danadesa','DanadesaContrroller');

    Route::resource('slider','SliderControoler');
    // management web
    Route::resource('webseting','WebController');
    Route::resource('sejarahs','SejarahController');
    Route::resource('grafik','GrafikController');


    // quetes
    Route::resource('quetes','QuetesController');
    Route::resource('keuangan','KeuanganController');

    Route::get('/dkomentar/{id}', 'BritaController@comen');
    Route::get('/dkomentar/hdkomentar/{id}', 'BritaController@hcomen');



});




// front end
Route::get('/brita/detail/{id}','BritaController@detail');
Route::get('/potensi/detail/{id}','PotensiController@detail');

Route::get('/berita','PageController@berita');

Route::get('/galerys','PageController@galery');
Route::get('/potensidesa','PageController@potensi');
Route::get('/sejarah','PageController@sejarah');
Route::get('/struktur','PageController@struktur');
Route::get('/visi','PageController@visi');
Route::get('/agama','PageController@agama');
Route::get('/pekerjaan','PageController@pekerjaan');
Route::get('/pendidikan','PageController@pendidikan');
Route::get('/jenisklamin','PageController@jenisklamin');
Route::get('/peta','PageController@peta');

Route::get('/pegawai/cari', 'BritaController@cari');
Route::post('/brita/komentar','BritaController@komentar');


// login
Route::post('/postlogin','UserController@postlogin');
Route::get('/logout', 'UserController@logout');