<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpHistory extends Model
{
    protected $fillable = [
        'ip',
        'user_agent',
        'hit_at'
    ];

    protected $casts = [
        'hit_at' => 'datetime'
    ];
} 