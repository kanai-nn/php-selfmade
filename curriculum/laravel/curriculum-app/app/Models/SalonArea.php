<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonArea extends Model
{
    use HasFactory;

    protected $table = 'salon_areas_table';

    protected $fillable = [
        'area',
    ];

    public function salons()
    {
        return $this->hasMany(Salon::class, 'area_id');
    }
}
