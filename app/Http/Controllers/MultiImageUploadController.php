<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiImageUploadController extends Controller
{
    public function create(){
        return view('multi');
    }

    public function store(Request $request){
        var_dump($request->file());die;
    }
}
