<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeautyService extends Model
{
    use HasFactory;

    protected $table = 'beauty_services_table';

    // 編集可能なカラムを指定
    protected $fillable = [
        'user_id',   // 外部キー (users.id)
        'name',      // 美容項目名
        'cycle',     // 美容周期日数
    ];

    // リレーションの定義（membersテーブルへの外部キー）
    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id', 'user_id');
    }
}
