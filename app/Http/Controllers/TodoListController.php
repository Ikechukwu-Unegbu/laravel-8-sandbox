<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoListController extends Controller
{
    
    public function index(){
        $list = TodoList::all();
        return response($list);
    }
}
