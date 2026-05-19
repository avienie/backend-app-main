<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['user_id', 'week', 'drive_link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}