<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'status_id',
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
