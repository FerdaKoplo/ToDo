<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueTag extends Model
{
    protected $fillable = [
        'issue_id',
        'tag_id'
    ];
}
