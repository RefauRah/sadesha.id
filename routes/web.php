<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function(){
//     echo auth()->user()->password;
// });
Route::get('/', 'HomeController@landingPage');
Route::prefix('panitia')->group(function(){
    Route::get('login', 'AuthController@index')->name('formLogin')->middleware('guest');
    Route::post('login', 'AuthController@postLogin')->name('login')->middleware('guest');
    Route::get('logout', 'AuthController@logout')->name('logout')->middleware('auth');
    Route::get('change_password', 'AuthController@changePasswordForm')->name('changePasswordForm')->middleware('auth');
    Route::post('change_password', 'AuthController@changePassword')->name('changePassword')->middleware('auth');
});
 
Route::group(['middleware' => 'admin'], function(){
    Route::prefix('kelola')->group(function(){
        Route::get('/','HomeController@index')->name('home');
        Route::prefix('diklat')->group(function(){
            Route::get('/', 'DiklatController@all')->name('diklat.all');
            Route::get('/create', 'DiklatController@create')->name('diklat.create');
            Route::post('/store', 'DiklatController@store')->name('diklat.store');
            Route::get('/edit/{id}', 'DiklatController@edit')->name('diklat.edit');
            Route::post('/update', 'DiklatController@update')->name('diklat.update');
            Route::post('/delete', 'DiklatController@delete')->name('diklat.delete');
        });
        Route::prefix('materi')->group(function(){
            Route::get('/', 'MateriController@all')->name('materi.all');
            Route::get('/create', 'MateriController@create')->name('materi.create');
            Route::post('/store', 'MateriController@store')->name('materi.store');
            Route::post('/update', 'MateriController@update')->name('materi.update');
            Route::get('/{id}', 'MateriController@detail')->name('materi.detail');
            Route::get('/edit/{id}', 'MateriController@edit')->name('materi.edit');
            Route::post('/delete', 'MateriController@delete')->name('materi.delete');
        });
        Route::prefix('peserta')->group(function(){
            Route::get('/', 'PesertaController@all')->name('peserta.all');
            Route::get('/pendaftar', 'PesertaController@unverified')->name('peserta.unverified');
            Route::get('/create', 'PesertaController@create')->name('peserta.create');
            Route::post('/store', 'PesertaController@store')->name('peserta.store');
            Route::get('/edit/{id}', 'PesertaController@edit')->name('peserta.edit');
            Route::get('/{id}', 'PesertaController@detail')->name('peserta.detail');
            Route::post('/update', 'PesertaController@update')->name('peserta.update');
            Route::get('/delete/{id}', 'PesertaController@delete')->name('peserta.delete');
            Route::get('/verifikasi/{id}', 'PesertaController@verification')->name('peserta.verify');
        });
        // Route::prefix('absensi')->group(function(){
        // });
        Route::prefix('faq')->group(function(){
            Route::get('/', 'FaqController@all')->name('faq.all');
            Route::get('/create', 'FaqController@create')->name('faq.create');
            Route::post('/store', 'FaqController@store')->name('faq.store');
            Route::get('/edit/{id}', 'FaqController@edit')->name('faq.edit');
            Route::post('/update', 'FaqController@update')->name('faq.update');
            Route::post('/delete', 'FaqController@delete')->name('faq.delete');
        });
    });
});



Route::prefix('peserta')->group(function(){
    Route::get('login', 'Peserta\AuthController@index')->name('peserta.formLogin')->middleware('guest');
    Route::post('login', 'Peserta\AuthController@postLogin')->name('peserta.login')->middleware('guest');
    Route::get('register', 'Peserta\AuthController@register')->middleware('guest')->name('peserta.registerForm');
    Route::post('register', 'Peserta\AuthController@postRegister')->middleware('guest')->name('peserta.register');
    Route::get('logout', 'Peserta\AuthController@logout')->name('peserta.logout')->middleware('peserta');
    Route::get('change_password', 'Peserta\AuthController@changePasswordForm')->name('peserta.changePasswordForm')->middleware('peserta');
    Route::post('change_password', 'Peserta\AuthController@changePassword')->name('peserta.changePassword')->middleware('peserta');

    Route::group(['middleware' => 'peserta'], function(){
        Route::get('/', 'Peserta\PesertaController@profile')->name('peserta.profile'); 
        Route::get('/data-diri','Peserta\PesertaController@edit')->name('peserta.dataDiri');
        Route::post('/data-diri','Peserta\PesertaController@update')->name('peserta.dataDiriUpdate');

        Route::get('/riwayat-pendidikan','Peserta\RiwayatPendidikanController@index')->name('peserta.riwayatPendidikan');
        Route::get('/riwayat-pendidikan/create','Peserta\RiwayatPendidikanController@create')->name('peserta.riwayatPendidikan.create');
        Route::post('/riwayat-pendidikan/store','Peserta\RiwayatPendidikanController@store')->name('peserta.riwayatPendidikan.store');
        Route::get('/riwayat-pendidikan/edit/{id}','Peserta\RiwayatPendidikanController@edit')->name('peserta.riwayatPendidikan.edit');
        Route::post('/riwayat-pendidikan/update','Peserta\RiwayatPendidikanController@update')->name('peserta.riwayatPendidikan.update');

        Route::get('/pengalaman-kerja','Peserta\PengalamanKerjaController@index')->name('peserta.pengalamanKerja');
        Route::get('/pengalaman-kerja/create','Peserta\PengalamanKerjaController@create')->name('peserta.pengalamanKerja.create');
        Route::post('/pengalaman-kerja/store','Peserta\PengalamanKerjaController@store')->name('peserta.pengalamanKerja.store');
        Route::get('/pengalaman-kerja/edit/{id}','Peserta\PengalamanKerjaController@edit')->name('peserta.pengalamanKerja.edit');
        Route::post('/pengalaman-kerja/update','Peserta\PengalamanKerjaController@update')->name('peserta.pengalamanKerja.update');

        Route::get('/pengalaman-organisasi','Peserta\PengalamanOrganisasiController@index')->name('peserta.pengalamanOrganisasi');
        Route::get('/pengalaman-organisasi/create','Peserta\PengalamanOrganisasiController@create')->name('peserta.pengalamanOrganisasi.create');
        Route::post('/pengalaman-organisasi/store','Peserta\PengalamanOrganisasiController@store')->name('peserta.pengalamanOrganisasi.store');
        Route::get('/pengalaman-organisasi/edit/{id}','Peserta\PengalamanOrganisasiController@edit')->name('peserta.pengalamanOrganisasi.edit');
        Route::post('/pengalaman-organisasi/update','Peserta\PengalamanOrganisasiController@update')->name('peserta.pengalamanOrganisasi.update');
       
        Route::get('/print_biodata', 'Peserta\PesertaController@printBiodata')->name('peserta.printBiodata');
    });
});
