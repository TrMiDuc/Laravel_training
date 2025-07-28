<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
    ];

    protected $hidden = [
        'user_id',
        'update_at'
    ];

    public function tasks(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
