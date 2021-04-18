<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Product;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create($id)
    {
        $cart = new Cart();
        $cart->client_id = $id;
        $cart->save();
        
        return redirect('/logincliente');
    }

    public function showproduct($id){
        $cart = Cart::where('client_id', '=', $id)->first();
        $cart_products = Cart_Product::where('cart_id', $cart->id)->get();
    

        return $cart_products;
        
    }
}
