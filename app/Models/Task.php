<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'tasks_name',
        'file',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function approvements()
    {
        return $this->hasMany(Approvement::class);
    }
}
