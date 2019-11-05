<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginActionActiveUser()
    {
        $validUser = $this->mockActiveUser();

        //$mockUser1 = User::find($validUser->id);

        $params = [
            'email' => $validUser->email,
            'password' => 'password',
        ];

        $response = $this->post('/login', $params);
        $response->assertRedirect('/');
        // cookie assertion goes here
        $this->assertAuthenticatedAs($validUser);
    }

    public function testLoginActionInactiveUser()
    {
        $invalidUser = $this->mockInactiveUser();

        $params = [
            'email' => $invalidUser->email,
            'password' => 'password',
        ];

        $response = $this->from('/login')->post('/login', $params);

        $response->assertRedirect('/login');
    }
}
