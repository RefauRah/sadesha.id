<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});

Route::get('/', function(){
    return 'Yay !';
});

Route::post('login', 'Api\AdminController@login');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', 'Api\AdminController@logout');
    Route::prefix('diklat')->group(function(){
        Route::get('/', 'Api\DiklatController@index');
        Route::post('/absen', 'Api\MateriController@absen');
        Route::get('/peserta', 'Api\DiklatController@getPeserta');
        Route::prefix('materi')->group(function(){
            Route::get('/', 'Api\DiklatController@getMateri');
            Route::get('/peserta/{id}', 'Api\MateriController@getPeserta');
        });
    });
    Route::prefix('peserta')->group(function(){
        Route::get('{id}', 'Api\PesertaController@getById');
    });
});

// Route::prefix('peserta')->group(function(){
//     Route::get('{id}', 'Api\PesertaController@getById');
//     Route::post('/login', 'Api\PesertaController@login');
//     Route::get('/logout', 'Api\PesertaController@logout');    
//     Route::group(['middleware' => 'auth:api'], function(){
//         Route::get('/', 'Api\PesertaController@index');    
//         Route::get('/riwayat-pendidikan', 'Api\RiwayatPendidikanController@index');
//         Route::get('/pengalaman-kerja', 'Api\PengalamanKerjaController@index');
//         Route::get('/pengalaman-organisasi', 'Api\PengalamanOrganisasiController@index');
//         Route::get('/materi', 'Api\MateriController@index');
//         Route::post('/absen', 'Api\MateriController@absen');
//         Route::get('/faq', 'Api\FaqController@index');
//     });
// });
