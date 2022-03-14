<?php

namespace App\Http\Controllers;

use App\Models\Awsimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Storage;
class AwsImageController extends Controller{
    
    public function index(){

        // $awsImages = Awsimage::paginate(10);
        $aws = Awsimage::find(2)->first();
        // foreach($awsImages as $awsImage){
        //     $exploded = explode('/', $awsImage);
        //     var_dump($exploded);die;   

        // }
        // return response()->make(
        //     Storage::disk('s3')->get($aws->img_url),
        //     200,
        //     ['Content-Type' => 'image/jpeg']
        // );
        $filename = explode('/', $aws->img_url);
        $file = end($filename);
        $aws->name = $file;
        return view('aws')->with('aws', $aws);
    }

    public function uploadpage(){
        return view('AwsImage');
    }

    public function upload(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image_name = time().'.'.$request->image->extension();  
     
        $path = Storage::disk('s3')->put('images', $request->image, ['public']);
        $path = Storage::disk('s3')->url($path);

        // here you need to store image path in database
        $aws = new Awsimage();
        $aws->img_url = $path;
        $aws->save();
        
        return redirect()->back()
            ->with('success', 'Image uploaded successfully.');
            // ->with('image', $path); 
    }
}
