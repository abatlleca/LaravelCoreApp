<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class TicketFilter extends AbstractFilter
{
    protected $filters = [
        'title' => LikeFilter::class,
        'description' => LikeFilter::class,
        'status_id' => EqualsFilter::class,
        'closed' => EqualsFilter::class,
    ];
}
