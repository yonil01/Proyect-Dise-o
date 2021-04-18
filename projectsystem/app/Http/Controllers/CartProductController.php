<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Product;
use App\Models\Client;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function create($id){
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];
        $var = collect($data);
        if(!$var->get('LoggedUserInfo')){
            return redirect('/logincliente');
        }else{
            $cart_id = Cart::where('client_id', $var->get('LoggedUserInfo')->id)->get();
            $cart_product = new Cart_Product();
            $cart_product->cart_id = $cart_id[0]->id;
            $cart_product->product_id = $id;
            $cart_product->save();
            return redirect()->route('client.dashboard');
        }
    }

    public function delete($id){
        $cart_product = Cart_Product::find($id);
        $cart_product->delete();
        return back();
    }
}
