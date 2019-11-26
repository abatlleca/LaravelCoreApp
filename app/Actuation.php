<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuation extends Model
{
    protected $fillable = [
        'description',
        'origin',
        'creator_id',
        'ticket_id',
        'isPrivate',
    ];

    public function ticket(){
        return $this->belongsTo('App\Ticket', 'ticket_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'creator_id');
    }
}
