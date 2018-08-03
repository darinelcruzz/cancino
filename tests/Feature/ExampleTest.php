<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    function testBasicTest()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
            ->get(route('/'))
            ->assertStatus(200);
    }
}
