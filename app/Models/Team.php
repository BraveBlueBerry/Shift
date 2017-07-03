<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    public function members()
    {
        return $this->belongsToMany('App\Models\User', 'team_user', 'team', 'user');
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Category', 'team', 'id');
    }
}
