<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'active',
    ];

    public function name(){
        return $this->name;
    }

    /**
     * The users that belong to the customer.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
