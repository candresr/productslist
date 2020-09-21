<?php

namespace Candresr\Productslist;

use Illuminate\Http\Request;

class ProductslisController extends Controller
{
    public function index()
    {
        return redirect()->route('products.list');
    }
}
