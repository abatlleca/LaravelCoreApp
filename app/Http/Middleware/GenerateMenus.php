<?php

namespace App\Http\Middleware;

use App\Menu;
use Closure;
use Illuminate\Support\Facades\View;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        View::share('menus_list', Menu::menus());
        return $next($request);
    }
}
