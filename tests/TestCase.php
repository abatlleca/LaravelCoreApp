<?php

namespace Tests;

use App\Menu;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Tests\Traits\RefreshDatabaseWithSeeds;
use App\User;
use Tests\Traits\UsersManagement;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabaseWithSeeds, UsersManagement;

    public function setUp(): void
    {
        parent::setUp();
        //Added to force the variable to be sent to views
        if (DB::getSchemaBuilder()->hasTable('menus')){
            View::share('menus_list', Menu::menus());
        }
    }

}
