<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
