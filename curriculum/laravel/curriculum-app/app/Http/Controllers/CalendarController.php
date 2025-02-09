<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menstrual;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Event;

class CalendarController extends Controller
{
    public function getRecentPeriods()
    {
        $userId = session('member_id');
    
        // 月経データを取得
        $menstruals = Menstrual::where('user_id', $userId)->get();
    
        // ベースイベント (直近の月経日、次回予定日)
        $baseEvents = $menstruals->map(function ($menstrual) {
            $startDate = Carbon::parse($menstrual->start_date);
            $nextPeriod = Carbon::parse($menstrual->next_period);
    
            return [
                [
                    'title' => '直近月経日',
                    'start' => $startDate->toDateString(),
                    'backgroundColor' => '#FFC0CB',
                    'textColor' => '#696969'
                ],
                [
                    'title' => '次回月経予定日',
                    'start' => $nextPeriod->toDateString(),
                    'backgroundColor' => '#FFC0CB',
                    'textColor' => '#696969'
                ]
            ];
        })->flatten(1)->toArray();
    
        // 月経周期に基づくフェーズイベント
        $phaseEvents = $menstruals->map(function ($menstrual) {
            $startDate = Carbon::parse($menstrual->start_date);
            $nextPeriod = Carbon::parse($menstrual->next_period);
    
            // 現在の周期と次回の周期を計算
            $currentPhases = $this->calculatePhases($startDate);
            $nextPhases = $this->calculatePhases($nextPeriod);
    
            return array_merge($currentPhases, $nextPhases);
        })->flatten(1)->toArray();
    
        // ユーザーの登録イベントを取得
        $userEvents = Event::where('user_id', $userId)->get()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'backgroundColor' => '#FFC7AF',  // ユーザーイベント用の色
                'textColor' => '#696969'
            ];
        })->toArray();
    
        // すべてのイベントを統合
        $allEvents = array_merge($baseEvents, $phaseEvents, $userEvents);
    
        return response()->json($allEvents);
    }

    private function calculatePhases(Carbon $baseDate)
    {
        return [
            [
                'title' => "月経期",
                'start' => $baseDate->toDateString(),
                'end' => $baseDate->copy()->addDays(6)->toDateString(),  // 1〜7日目
                'backgroundColor' => '#FFF0F5',
                'textColor' => '#696969'
            ],
            [
                'title' => "キラキラ期",
                'start' => $baseDate->copy()->addDays(7)->toDateString(),
                'end' => $baseDate->copy()->addDays(13)->toDateString(),  // 8〜14日目
                'backgroundColor' => '#FFE4C4',
                'textColor' => '#696969'
            ],
            [
                'title' => "ニュートラル期",
                'start' => $baseDate->copy()->addDays(14)->toDateString(),
                'end' => $baseDate->copy()->addDays(20)->toDateString(),  // 15〜21日目
                'backgroundColor' => '#E0FFFF',
                'textColor' => '#696969'
            ],
            [
                'title' => "アンバランス期",
                'start' => $baseDate->copy()->addDays(21)->toDateString(),
                'end' => $baseDate->copy()->addMonth()->subDay()->toDateString(),  // 次の月経日前日
                'backgroundColor' => '#F0F8FF',
                'textColor' => '#696969'
            ]
        ];
    }
}


