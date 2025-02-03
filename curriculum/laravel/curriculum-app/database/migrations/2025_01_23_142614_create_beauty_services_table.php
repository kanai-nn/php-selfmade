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
        Schema::create('beauty_services_table', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->string('user_id', 50); // 外部キー（users.id）
            $table->string('name', 255); // 美容項目名
            $table->integer('cycle'); // 美容周期日数
            $table->timestamps(); // 登録日時と更新日時
            $table->softDeletes(); // 削除日時
    
            // 外部キー制約
            $table->foreign('user_id')->references('user_id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beauty_services_table');
    }
};
