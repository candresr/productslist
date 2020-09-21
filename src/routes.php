<?php


Route::get('/test', function(){
    echo "Product Package";
});

Route::resource('/products', 'Candresr\Productlist\ProductlistController');