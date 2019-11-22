<?php

namespace App\Filters;

class LikeFilter
{
    public function filter($builder, $filter, $value){
        return $builder->where($filter, "LIKE", "%".$value."%");
    }
}
