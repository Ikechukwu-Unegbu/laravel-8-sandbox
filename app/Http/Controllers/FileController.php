<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller{
    
    public function uploadpage(Request $request){
        return view('file.file');
    }

    public function upload(Request $request){
        $request->validate([
            'pic'=>'required'
        ]);

        // $image_name = time().'.'.$request->pic->extension();  
        // $pathpub = public_path('images');
        // $path = Storage::disk('local')->put('testfolder/'.$request->pic, 'Contents');
        // $path = Storage::disk('local')->url($path);
        $path = Storage::disk('public')->put('images/'.$request->pic, 'Contents');
        $path = Storage::disk('public')->url($path);
        return redirect()->route('file');
    }
}
