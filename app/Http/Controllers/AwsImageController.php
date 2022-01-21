<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Storage;
class AwsImageController extends Controller{
    
    public function index(){
        return view('awsImage');
    }

    public function upload(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image_name = time().'.'.$request->image->extension();  
     
        $path = Storage::disk('s3')->put('images', $request->image);
        $path = Storage::disk('s3')->url($path);

        // here you need to store image path in database
    
        return redirect()->back()
            ->with('success', 'Image uploaded successfully.')
            ->with('image', $path); 
    }
}
