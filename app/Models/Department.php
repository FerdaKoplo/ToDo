<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Issue> $issues
 * @property-read int|null $issues_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $fillable = ['name'];

    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }
}
