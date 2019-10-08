<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Because the primary key is a string, define as not incrementing
    protected $primaryKey = 'role_name'; // or null
    public $incrementing = false;

    protected $fillable = ['role_name'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function menus()
    {
        return $this->hasMany('App\Menu');
    }
}
