<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'title',
        'reward',
        'description',
        'entry_end_at',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo('\App\Models\User', 'owner_id');
    }
}
