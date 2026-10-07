<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Issue extends Model
{
    protected $fillable = [
        'department_id',
        'title',
        'reference_url',
        'issue_date',
        'image_path',
        'status',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function issueTag(): HasMany
    {
        return $this->hasMany(IssueTag::class);
    }
}
