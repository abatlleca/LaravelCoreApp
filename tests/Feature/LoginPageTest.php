<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginPageElements()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSeeText('Password');
        $response->assertSeeText('Login');
    }
}
