<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check dashboard is reached with authenticated user.
     *
     * @return void
     */
    public function testDashboardSeen()
    {
        $validUser = $this->mockActiveUser();

        $this->actingAs($validUser);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Dashboard');


    }

    /**
     * Check contact page is reached with authenticated user.
     *
     * @return void
     */
    public function testContactPage()
    {
        $validUser = $this->mockActiveUser();

        $this->actingAs($validUser);

        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSeeText('Contact');
    }
}
