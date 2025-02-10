<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $table = 'salons_table';

    protected $fillable = [
        'name',
        'area_id',
        'type',
        'data',
        'img',
    ];

    public function area() {
        return $this->belongsTo(SalonArea::class, 'area_id');
    }
}
