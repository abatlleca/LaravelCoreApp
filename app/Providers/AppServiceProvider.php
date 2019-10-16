<?php

namespace App\Providers;

use App\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	Schema::defaultStringLength(191);
        if (DB::getSchemaBuilder()->hasTable('menus')){
            View::share('menus_list', Menu::menus());
        }
    }
}
