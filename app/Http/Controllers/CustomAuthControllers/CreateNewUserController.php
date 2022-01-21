<?php

namespace App\Http\Controllers\CustomAuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CreateNewUserController extends Controller
{
    //
    public function store(Request $request){
        $array = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        // var_dump($array);

        $resource = new UserResource($array);

        var_dump($array);
    }
}
