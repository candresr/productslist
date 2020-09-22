<?php

namespace Candresr\Productlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Candresr\Productlist\Products;
use \Session;

class ConexionController extends Controller
{
    private $client;
    public $access_token;

    public function __construct(){

        $this->client = new Client();
    }

    function conexion(Request $request){

        $res = $this->client->post($request->get('url'), [
            'json' => [
                'username' => $request->get('usuario'),
                'password' => $request->get('pwd')
            ]
        ]);
        $this->access_token = $res->getBody()->getContents();
        $this->obtenerProdutos($this->access_token);
        return back()->with('status', true)->with('msg', 'Conexion exitosa');
    }

    function obtenerProdutos($token){

        $url ="http://desarrollomagento.ariadna.co/rest/V1/products?searchCriteria[page_size]=100";

        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ];

       
        $res = $this->client->get($url, [
            'headers' => $headers
        ]);
        $data = json_decode($res->getBody()->getContents(), true);

        $this->salvarProductos($data);
    }

    function salvarProductos($data){
        $count = Products::count();
        $length = count($data['items']);
        if($count > 0){
            Products::truncate();
        }
        
        for($i = 0; $i < $length; $i++){
            if(!$data['items'][$i]['media_gallery_entries'][0]['disabled']){
                $productos = new Products();
                $productos->name = $data['items'][$i]['name'];
                $productos->price = $data['items'][$i]['price'];
                $productos->file = $data['items'][$i]['media_gallery_entries'][0]['file'];
                $productos->disabled = $data['items'][$i]['media_gallery_entries'][0]['disabled'];
                $productos->save();
            }
        }
    }

}
