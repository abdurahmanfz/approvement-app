<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvement extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'task_id',
        'approved_by_id',
        'step',
        'status',
        'notes'
    ];

    public function approved_by()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(User::class);
    }
}
