<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_todo_list()
    {
        //preparation - prepare
        TodoList::create(['name'=>'my test list']);
        // dd($this->get(route('todo-list.index')));
        //action - perform
        $response = $this->getJson(route('todo-list.index'));

        //assertions - predict
        $this->assertEquals(1, count($response->json()));

    }
}
