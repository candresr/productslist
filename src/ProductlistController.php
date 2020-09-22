<?php

namespace Candresr\Productlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Candresr\Productlist\ConexionController;
use \Session;
use DB;

class ProductlistController extends Controller
{

    public $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionController();
    }

    public function index()
    {
        $data = DB::table('products')->paginate(4);
        return view('products::app', compact('data'));
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $data = DB::table('products')->paginate(5);
      return view('products::app', compact('data'))->render();
     }
    }

 
}
