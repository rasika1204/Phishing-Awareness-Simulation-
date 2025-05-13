<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    protected $fillable = [
        'subject',
        'email_body',
        'phishing_link',
    ];
    
    /**
     * Get the click logs for the campaign.
     */
    public function clickLogs(): HasMany
    {
        return $this->hasMany(ClickLog::class);
    }
}
