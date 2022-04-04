<?php

namespace App\Http\Controllers;

use App\Models\Morph;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    //
    public function store(Request $request){
       
        // $product = Product::find(1);
        $product = Product::find(2);
        // $product->name = 'Morph Testing';
        // $product->vendor = 'Software Craftsman';
        // $product->model = 'Testing';
        // $product->email = 'morph@morph.com';
        // $product->save();
        $morph= new Morph;
        $morph->dummy = 'dummy content here';
        $product->morphs()->save($morph);
    }
}
