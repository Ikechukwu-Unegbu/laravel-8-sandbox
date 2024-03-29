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

    public function setUp(): void
    {
        parent::setUp();
        $this->list = TodoList::factory()->create([
            'name'=>'my list'
        ]);
    }
    public function test_fetch_todo_list()
    {
        //action - perform
        $response = $this->getJson(route('todo-list.index'));

        //assertions - predict
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('my list', $response->json()[0]['name']);
    }

    public function test_fetch_single_todo_list(){
        $response = $this
                    ->getJson(route('todo-list.show', $this->list->id))
                    ->assertOk()
                    ->json();
        $this->assertEquals($response['name'],$this->list->name);
    }

     public function test_store_new_todo_list(){
        $list = TodoList::factory()->make();

        $response = $this->postJson(route('todo-list.store'), ['name'=>$list->name])
            ->assertCreated()
            ->json();
        
        $this->assertEquals($list->name, $response['name']);
        $this->assertDatabaseHas('todo_lists', ['name'=>$list->name]); 
     }

     public function test_while_storing_todo_list_name_field_is_required(){
         $this->withExceptionHandling();
         $response = $this->postJson(route('todo-list.store'))
                ->assertStatus(422);
     }
}
