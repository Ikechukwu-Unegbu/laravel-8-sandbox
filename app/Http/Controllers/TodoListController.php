<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    
    public function index(){
        $list = TodoList::all();
        return response($list);
    }

    public function show(TodoList $todolist){

        //$list = TodoList::findOrFail($todolist);
        
        return response($todolist);
    }

    public function store(Request $request){
        $list = TodoList::create($request->all());
        return response($list, Response::HTTP_CREATED);
    }
}
