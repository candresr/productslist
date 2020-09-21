<?php

namespace Candresr\Productlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductlistController extends Controller
{
    public function index()
    {
        return view('products::app');
    }
}
