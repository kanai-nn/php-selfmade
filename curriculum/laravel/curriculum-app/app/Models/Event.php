<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start', 'end', 'user_id'];

    public function user() {
        return $this->belongsTo(Member::class, 'user_id', 'user_id');
    }
}
