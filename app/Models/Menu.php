<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $guarded = [];
    protected $hidden = ['id'];
    protected $appends = ['key'];


    public function children() {
        return $this->hasMany('App\Models\Menu','parent','id') ;
    }

    public function getKeyAttribute()
    {
        return $this->id;
    }
}
