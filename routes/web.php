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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('performances', 'PerformanceController');
    Route::resource('marcas', 'MarcaController');
    Route::resource('fabricantes', 'FabricanteController');
    Route::resource('produtos', 'ProdutoController');

    Route::get('/get-marca-datatables-data', 'MarcaController@getMarcaDatatablesData')->name('marca_datatables_data');
    Route::get('/get-fabricante-datatables-data', 'FabricanteController@getFabricanteDatatablesData')->name('fabricante_datatables_data');
});

Route::get('/', 'HomeController@index')->name('home');


