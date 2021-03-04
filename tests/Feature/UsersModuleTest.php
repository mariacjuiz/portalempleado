<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /** @test */
        function load_users_all()
        {
            $response = $this->get('/users');
            $response->assertStatus(200);
        }
    /** @test */
    function load_user_new()
    {
        $response = $this->get('/user/new');
        $response->assertStatus(200);
    }

    /** @test */
    function load_user_id()
    {
        $response = $this->get('/user/5');
        $response->assertStatus(200);
    }

    /** @test */
    function load_profile_user()
    {
        $response = $this->get('/profile');
        $response->assertStatus(200);
    }
}
