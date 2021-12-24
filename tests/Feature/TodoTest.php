<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    public function testTODO取得()
    {
        $response = $this->get('/api/todos');

        $expected = [
            'data' => $this->isType('array'),
        ];

        $response
            ->assertStatus(200)
            ->assertExactJsonPartially($expected);
    }

    public function testTODO登録()
    {
        $response = $this->post('/api/todos', [
            'content' => 'テストTODO',
        ]);

        $expected = [
            'data' => $this->isType('array'),
        ];

        $response
            ->assertStatus(201)
            ->assertExactJsonPartially($expected);
    }
}
