<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function Create($cantidad){
        $newStock = new Stock();
        $newStock->cantidad = $cantidad;
        $newStock->save();

        return $newStock->id;
    }

   
}
