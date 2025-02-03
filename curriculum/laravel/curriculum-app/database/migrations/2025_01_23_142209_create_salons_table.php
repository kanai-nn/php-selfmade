<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salons_table', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->string('name', 255); // サロン名
            $table->unsignedBigInteger('area_id'); // 外部キー（salon_areas_table.id）
            $table->string('type', 255); // サロンタイプ
            $table->string('data', 255)->nullable(); // サロン詳細
            $table->string('img', 255)->nullable(); // サロン画像
            $table->timestamps(); // 登録日時と更新日時
            $table->softDeletes(); // 削除日時
    
            // 外部キー制約
            $table->foreign('area_id')->references('id')->on('salon_areas_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salons_table');
    }
};
