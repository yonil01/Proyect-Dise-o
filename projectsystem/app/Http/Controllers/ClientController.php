<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

use Facades\App\Helper\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_Product;
use App\Models\Doctor;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\SessionGuard;


class ClientController extends Controller
{
   
    public function create(){
        return view('auth.registeruser');
    }

    public function store(Request $request){
        //validar
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:clients',
            'password'=>'required|min:5|max:30',
        ]);

        $newclient = new Client();
        $newclient->name = $request->name;
        $newclient->email = $request->email;
        $newclient->password = Hash::make($request->password);
        $save = $newclient->save();

       if($save){
           return redirect()->route('cart.create', $newclient->id);
       }else{
        return back()->with('fail', 'New User has been successfuly addesd to database');
       }

    }

    
    function check(Request $request){
       
        //validar request
        $request->validate([
            'enail'=>'requires|email',
            'password'=>'required|min:5|max:30'
        ]);

        $userInfo = Client::where('email',"=",$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //checked password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/menu');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];

        $cart = new CartController();
        $cart_products = $cart->showproduct(session('LoggedUser'));
        $products = Product::all();

        return view('layouts.dashboard', $data)->with([
            'cart_products' => $cart_products,
            'products' => $products
        ]); 
        }

    function seting(){
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];
        return view('client
        .seting', $data);
    }
    function profile(){
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];
        return view('client
        .profile', $data);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];
        return view('client
        .staff', $data);
    }

    function home(){
    
        return redirect('');
    }

}
