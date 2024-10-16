<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function scopeInOrder(Builder $query)
    {
        $query->orderBy('sort');
    }
}
