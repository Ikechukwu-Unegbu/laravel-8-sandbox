<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SearchErrorHandlingController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;    
    }

    public function index(){
        return view('errorhandling.index');
    }

    public function search(Request $request){
        // var_dump($request->search_term);die;
        // try{
        //     $user = User::findOrFail($request->input('search_term'));
        // }catch(ModelNotFoundException $exception){
        //     return back()->withErrors('User not found by ID ' . $request->input('user_id'))->withInput();
        // }

        try{
            $user = $this->userService->search($request->input('search_term'));
        }catch(ModelNotFoundException $exception){
            return back()->withErrors('User not found by ID ' . $request->input('user_id'))->withInput();
        }

        return view('errorhandling.result', compact('user'));
    }
}
