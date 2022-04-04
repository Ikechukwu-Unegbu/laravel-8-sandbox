<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{
    public function index(){
        return view('pages.products.index');
    }

    public function store(Request $request){

        $product = new Product();
        $product->name = $request->name;
        $product->vendor = $request->vendor;
        $product->model = $request->model;
        $product->email = $request->email;
        $product->save();
        FacadesSession::flash('success', 'Product posted');
        return redirect()->back();
    }

    public function get($id){
        $product = Product::find($id);

        return view('pages.products.show');
    }

    public function getApi($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function query(Request $request){
        $invitee = $request->input('invitee');
        var_dump($invitee);
    }

    public function postIndex(){
        return view('pages.products.post');
    }

    public function queryPost(Request $request){
        
        return response($request->all());
    }
}
