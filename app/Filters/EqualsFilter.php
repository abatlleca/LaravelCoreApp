<?php

namespace App\Filters;

class EqualsFilter
{
    public function filter($builder, $filter, $value){
        return $builder->where($filter, "=", $value);
    }
}
