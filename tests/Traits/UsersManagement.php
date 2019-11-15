<?php

namespace Tests\Traits;

use App\User;

trait UsersManagement{
    /**
     * @return mixed
     */
    protected function mockActiveUser(){
        return factory(User::class)->create();
    }

    protected function mockInactiveUser(){
        $mockUser = factory(User::class)->create();
        $mockUser->isActive = 0;
        $mockUser->save();

        return $mockUser;
    }
}
