<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'name',
    ];


    /**
     * The tickets that belong to the status.
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
