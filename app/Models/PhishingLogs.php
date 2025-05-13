<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhishingLogs extends Model
{
    // Allow mass assignment on these fields:
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'ip_address',
        'user_agent',
        'type',
    ];
}
