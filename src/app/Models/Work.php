<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function owner()
    {
        return $this->belongsTo('\App\Models\User', 'owner_id');
    }
}
