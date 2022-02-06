<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Gmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Providers\LoginHistory;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    //

    public function register(Request $request){
  
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email, 
            'password'=>Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $details = [
            'title'=>'Thank you for signing registering with us.',
            'body'=> 'You have successfully registered with artisan finder.'
        ];
        
        Mail::to($request->input('email'))->send(new Gmail($details));
        
        return response()->json(
            [
                'data'=>$user, 
                'access_token'=>$token
            ]
            );//

    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return response(['message'=>'unathorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        event(new LoginHistory($user));
        return response()->json(['message'=>'Hi '.$user->name.',  welcome to home', 'access_token'=>$token, 'token_type'=>'Bearer']);
    }

    public function logout(){
        $user = new User();

        $user->tokens()->delete();
        return [
            'message'=>'You have successfully logged out.'
        ];
    }

}
