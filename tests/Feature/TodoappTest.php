<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Todos;

class TodoappTest extends TestCase
{
    use DatabaseMigrations;
    #use WithoutMiddleware;

    public function testTodoapp()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/todo');
        $response->assertStatus(302);

        $response = $this->get('/todo/create');
        $response->assertStatus(302);

        $response = $this->get('/todo/edit');
        $response->assertStatus(302);

        $response = $this->get('/todo/del');
        $response->assertStatus(302);


        $user = factory(User::class)->create();
        $Todos = factory(Todos::class)->create();

        $response = $this->actingAs($user)->get('/todo');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/todo/create');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/todo/edit?id=1');
        $response->assertStatus(200);

        $response = $this->actingAs($user)->get('/todo/del?id=1');
        $response->assertStatus(200);

        $response = $this->get('no_route');
        $response->assertStatus(404);
    }
}
