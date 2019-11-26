<?php

namespace App;

use App\Filters\TicketFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'origin',
        'priority',
        'customer_id',
        'creator_id',
        'status_id',
        'isPrivate',
        'closed'
    ];

    public function scopeFilter(Builder $builder, $request)
    {
        return (new TicketFilter($request))->filter($builder);
    }

    /**
     * The actuations that belong to the ticket.
     */
    public function actuations(){
        return $this->hasMany('App\Actuation', 'ticket_id', 'id');
    }

    public function status(){
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
