<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'team_user', 'user', 'team');
    }
    public function invitations()
    {
        return $this->hasMany('App\Models\Invitation', 'user', 'id');
    }
}
