<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DataTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    public $allData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->allData = [
            "data" => [
                "array" => [
                    1,
                    2,
                    3
                ],
                "boolean" => true,
                "color" => "gold",
                "null" => null,
                "number" => 123,
                "object" => [
                    "a" => "b",
                    "c" => "d"
                ],
                "string" => "Hello World"
            ]
        ];
    }

    public function test_can_post_data()
    {
        $this->postJson('/api/datas', $this->allData)
            ->assertStatus(200);
    }

    public function test_can_show_data()
    {
        $this->get('/api/datas')
            ->assertStatus(200);
    }
}
