<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_new extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'user_id',
        'password',
        'role',
        'salon_area_id'
    ];

    public function salonArea() {
        return $this->belongsTo(SalonArea::class, 'salon_area_id');
    }
}
