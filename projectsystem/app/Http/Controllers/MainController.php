<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\CompanyController;
use App\Models\Client;

class MainController extends Controller
{
    public function index()
    {
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];

        $productos =  Product::all();
       $categories =  Category::all();
        return view('welcome', $data)->with([
            'productos'=> $productos,
            'categories'=> $categories

        ]);
    }

    public function show($id){
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];

        $product = Product::find($id);

        $cat = new CompanyController();
        $info = $cat->name_user($product->company_id);

        return view('product.detail', $data)->with([
            'product'=> $product,
            'info' =>$info
            ]);
    }
}
