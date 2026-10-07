<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $fillable = [
        'scheduled_at',
        'timezone',
        'issue_id',
        'frequency',
        'interval',
        'is_recurring',
        'recurrence_end_at'
    ];

    public function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }
}
