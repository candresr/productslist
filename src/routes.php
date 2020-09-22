<?php


Route::get('/test', function(){
    echo "Product Package";
});

// Route::resource('/products', 'Candresr\Productlist\ProductlistController');

Route::post('conexion', 'Candresr\Productlist\ConexionController@conexion')->name('conexion-form');
Route::get('/pagination', 'Candresr\Productlist\ProductlistController@index');
Route::get('pagination/fetch_data', 'Candresr\Productlist\ProductlistController@fetch_data');