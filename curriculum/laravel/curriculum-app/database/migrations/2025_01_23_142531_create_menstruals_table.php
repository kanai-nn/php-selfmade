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
        Schema::create('menstruals_table', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('user_id', 50); // ユーザーID
            $table->date('start_date'); // 直近月経開始日
            $table->integer('cycle'); // 月経周期日数
            $table->timestamps(); // 登録日時, 更新日時
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
        Schema::dropIfExists('menstruals_table');
    }
};
