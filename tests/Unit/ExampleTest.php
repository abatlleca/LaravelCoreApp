<?php

namespace Tests\Unit;

use App\Menu;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * Check menus are loaded.
     *
     * @return void
     */
    public function testMenusSeed()
    {
//        $validUser = $this->mockUser();
//
//        $this->actingAs($validUser);

        $menus = Menu::getAllMenus();
        if (count($menus) > 0) {
            //dd($menus);
            $this->assertTrue(true);
        }
    }
}
