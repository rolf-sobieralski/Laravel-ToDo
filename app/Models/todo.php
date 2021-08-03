<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class, 'project_id', 'id');
    }
}
