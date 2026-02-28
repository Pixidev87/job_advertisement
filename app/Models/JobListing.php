<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobListing extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'local',
        'description',
        'type',
        'status',
        'salary',
        'valid_from',
        'valid_to',
        'slug'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }
}
