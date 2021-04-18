<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Create($name){
        $categorie = $this->Show($name);
        if(count($categorie) >= 1){
            return $categorie[0]->id;
        }else{
            $newCategory = new Category();
            $newCategory->name=$name;
            $newCategory->save();

            $categorie = $this->Show($name);
            return $categorie[0]->id;
        }
    }

    public function Show($name){
        $category = Category::where('name',$name)->get();
        return $category;
    }
}
