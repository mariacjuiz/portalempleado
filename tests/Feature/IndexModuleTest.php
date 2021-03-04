<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexModuleTest extends TestCase
{
    /** @test */
        function load_company_news()
        {
            $response = $this->get('/index');
            $response->assertStatus(200);
        }

        /** @test */
        function load_company_promo()
        {
            $response = $this->get('/index/promo');
            $response->assertStatus(200);
        }

        /** @test */
        function load_company_course()
        {
            $response = $this->get('/index/course');
            $response->assertStatus(200);
        }
}
