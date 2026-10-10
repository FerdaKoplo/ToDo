<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $issue_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IssueTag extends Model
{
    protected $fillable = [
        'issue_id',
        'tag_id'
    ];
}
