<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'route',
        'icon',
        'order',
        'role_name',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_name', 'role_name');
    }

    public function parent()
    {
        return $this->belongsTo('App\Menu', 'parent_id', 'id');
    }

    public function submenus()
    {
        return $this->hasMany('App\Menu', 'parent_id');
    }
}
