<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Menstrual;
use Carbon\Carbon;

class UpdateNextPeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-next-period';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '次回月経予定日を更新する';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $menstruals = Menstrual::all();
    
        foreach ($menstruals as $menstrual) {
            // 現在の次回予定日を取得
            $current_next_period = $menstrual->next_period 
                ? Carbon::parse($menstrual->next_period) 
                : Carbon::parse($menstrual->start_date);
    
            // 現在の日付
            $today = Carbon::now();
    
            // 次回予定日が過ぎているかをチェック
            if ($current_next_period->lessThan($today)) {
                // サイクル日数を取得して次の予定日を計算
                $cycle_days = $menstrual->cycle;
                $new_next_period = $current_next_period->addDays($cycle_days);
    
                // データベースに次回予定日を更新
                $menstrual->update([
                    'next_period' => $new_next_period->format('Y-m-d')
                ]);
    
                $this->info("User: {$menstrual->user_id} の次回予定日を更新しました: {$new_next_period->format('Y-m-d')}");
            }
        }
    }
}
