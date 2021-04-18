<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $data = ['LoggedUserInfo'=>Client::where('id','=', session('LoggedUser'))->first()];

        $cart = new CartController();
        $cart_products = $cart->showproduct(session('LoggedUser'));
        $products = Product::all();

        return view('venta.index', $data)->with([
            'cart_products' => $cart_products,
            'products' => $products
        ]); 

        return view('venta.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create($id)
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
