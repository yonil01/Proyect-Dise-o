<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        //crear categoria
        $category = new CategoryController();
        $id_category = $category->Create($request->category);

        //Product
        $request->validate([
            'image' => 'required|image'
        ]);
        $image = $request->file('image')->store('public/img');
        $url = Storage::url($image);
        $newProduct = new Product();

        $newProduct->name = $request->get('name');
        $newProduct->type_category=$request->get('category');
        $newProduct->cost = $request->get('cost');
        $newProduct->cost_delivery = $request->get('cost_delivery');
        $newProduct->type_delivery = $request->get('type_delivery');
        $newProduct->qualification = 0;
        $newProduct->description = $request->get('description');
        $newProduct->quantify = $request->get('quantify');
        $newProduct->quantify = $request->get('quantify');
        $newProduct->url = $url;
        //empresa  
        $newProduct->company_id = auth()->user()->id;
        //category
        $newProduct->category_id = $id_category;
      
        $newProduct->save();

        return redirect('empresa');
       
        /* return redirect('/empresa');  */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $product = Product::find($id);
        $product->delete();
        return redirect('/empresa');
    }
}
