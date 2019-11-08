<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetEnvironment
{
    /**
     * Create the event listener.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->user->hasRole('admin-panel')){
            $this->request->session()->put('environment' , 'admin-panel');
//            dd($this->request->session());
        }else if ($event->user->hasRole('customer-panel')){
            $this->request->session()->put('environment' , 'customer-panel');
        }
    }
}
