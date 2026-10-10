<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $tag_name
 * @property string|null $color
 * @property string|null $icon
 * @property string $tag_types
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IssueTag> $issueTag
 * @property-read int|null $issue_tag_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereTagName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereTagTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tags extends Model
{
    protected $fillable = [
        'tag_name',
        'color',
        'icon',
        'tag_types'
    ];

    public function issueTag(): HasMany
    {
        return $this->hasMany(IssueTag::class);
    }

}
