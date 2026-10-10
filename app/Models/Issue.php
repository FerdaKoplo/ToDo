<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int|null $status_id
 * @property int|null $priority_id
 * @property int $department_id
 * @property string $title
 * @property string|null $reference_url
 * @property \Illuminate\Support\Carbon $issue_date
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IssueTag> $issueTag
 * @property-read int|null $issue_tag_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereReferenceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
