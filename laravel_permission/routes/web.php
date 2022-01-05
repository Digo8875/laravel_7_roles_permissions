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

//ROUTES User Logado
Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // ROUTES para Escritor
    Route::middleware('role:required_one_role,escritor')->group(function () {

        Route::resource('artigo', 'ArtigoController');

    });

    // ROUTES para Revisor
    Route::middleware('role:required_one_role,revisor')->group(function () {

        Route::get('/listar_artigos_revisao', 'ArtigoManageController@listArtigosRevisar')->name('listar_artigos_revisao');
        Route::get('/listar_artigos_revisados', 'ArtigoManageController@listArtigosRevisados')->name('listar_artigos_revisados');
        Route::get('/revisar_artigo/{id}', 'ArtigoManageController@revisarArtigo')->name('revisar_artigo');
        Route::put('/aceitar_artigo/{id}', 'ArtigoManageController@aceitarArtigo')->name('aceitar_artigo');
        Route::put('/recusar_artigo/{id}', 'ArtigoManageController@recusarArtigo')->name('recusar_artigo');

    });

    // ROUTES para Leitor
    Route::middleware('role:required_one_role,leitor')->group(function () {

        Route::get('/pesquisar_artigos', 'ArtigoController@pesquisarArtigos')->name('pesquisar_artigos');
        Route::get('/ler_artigo/{id}', 'ArtigoController@lerArtigo')->name('ler_artigo');

    });

    // ROUTES para Admins master e permissions
    Route::middleware('role:required_one_role,admin-master|admin-permissions')->group(function () {

        Route::resource('permission', 'PermissionController');

    });

});










Route::get('/test_blade_role', 'TestController@testBladeRole')->name('test_blade_role');

Route::get('/test_base', 'TestController@testBase')->name('test_base');
Route::get('/test_permission_reviewer', 'TestController@testPermissionReviewer')->name('test_permission_reviewer');
Route::get('/test_permission_manager', 'TestController@testPermissionManager')->name('test_permission_manager');
