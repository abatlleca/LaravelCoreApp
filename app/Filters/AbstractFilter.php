<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter (Builder $builder)
    {
        foreach ($this->getFilters() as $filter => $value){
            $this->resolveFilter($filter)->filter($builder, $filter, $value);
        }
        return $builder;
    }

    public function getFilters ()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    public function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
