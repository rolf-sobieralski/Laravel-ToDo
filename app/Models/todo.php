<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

        protected $fillable = [
        'project_id',
        'name',
        'slug',
        'description',
        'completed'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class, 'project_id', 'id');
    }
}
