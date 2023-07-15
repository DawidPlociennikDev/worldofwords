<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_return_values(): void
    {
        $this->get(route('api.get'))
            ->assertOk()
            ->assertJsonStructure(['count', 'results']);
    }

    public function test_api_contains(): void
    {
    }
}
