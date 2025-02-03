<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menstrual extends Model
{
    use HasFactory;

    protected $table = 'menstruals_table';

    protected $fillable = [
        'user_id',
        'start_date',
        'cycle',
    ];

    public function user() {
        return $this->belongsTo(Member::class, 'user_id', 'user_id');
    }
}
