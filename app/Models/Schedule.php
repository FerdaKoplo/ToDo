<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $scheduled_at
 * @property string $timezone
 * @property int $issue_id
 * @property string|null $frequency
 * @property int $interval
 * @property int $is_recurring
 * @property string $recurrence_end_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Issue $issue
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereIsRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereRecurrenceEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
