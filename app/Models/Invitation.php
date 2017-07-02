<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function team_object()
    {
        return $this->hasOne('App\Models\Team', 'id', 'team');
    }
}
