<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menstrual;
use Carbon\Carbon;
use App\Models\BeautyService;
use App\Models\Salon;

class Maincontroller extends Controller
{
    public function getMain() {
        if (!session()->has('member_id')) {
            return redirect('/login')->with('error', 'ログインが必要です');
        }
        // セッションのuser_idと一致するbeauty_serviceテーブルのuser_idを取得
        $userid = session('member_id');
        
        $names = BeautyService::where('user_id', $userid)->get()->pluck("name");
        $cycles = BeautyService::where('user_id', $userid)->get()->pluck("cycle");

        $row = BeautyService::where('user_id', $userid)->get();
        $currentDate = Carbon::now();

        $calculatedCycles = [];  
        // 経過日数を格納する配列

        foreach ($row as $record) {
            // updated_at から経過した日数を計算
    
            $daysElapsed = $currentDate->diffInDays(Carbon::parse($record->updated_at));
            $adjustedCycle = max($record->cycle - $daysElapsed, 0);
       
            // 経過日数を格納
            $calculatedCycles[] = [
                'id' => $record->id, 
                'service_name' => $record->name,
                'original_cycle' => $record->cycle,
                'adjusted_cycle' => $adjustedCycle
            ];

        }

        $salons = Salon::all();
        $currentPhase = $this->determineCurrentPhase($userid);
        $comment = $this->getCommentForPhase($currentPhase);
       
        return view('main', compact('calculatedCycles','comment', 'salons'));

    }

    private function determineCurrentPhase($userId)
    {
        $menstrual = Menstrual::where('user_id', $userId)->first();
        // dd($menstrual);
        // ユーザーの月経開始日を基に期間を計算する（例: DBから取得するべき部分）
        $baseDate = Carbon::parse($menstrual->start_date); // 実際はユーザーごとの基準日を使うべきです。
        $phases = $this->calculatePhases($baseDate);

        $today = Carbon::now()->toDateString();

        foreach ($phases as $phase) {
            if ($today >= $phase['start'] && $today <= $phase['end']) {
                return $phase['title'];
            }
        }

        return '不明な期間';
    }


    
    private function getCommentForPhase($phase)
    {
        $comments = [
            '月経期' => '今日は月経期ですね。体が重く感じたり、少し疲れやすいかもしれません。無理をせず体を温めてゆっくり過ごしましょう。ハーブティーやお風呂でリラックスするのもおすすめです♪',
        
            'キラキラ期' => '今日はキラキラ期です！ホルモンバランスが整い、肌もつやつやして調子がいい時期です。新しい挑戦に最適な日ですから、ぜひ自分磨きに時間を使ってみてくださいね♪',
            
            'ニュートラル期' => '今日はニュートラル期です。心も体も穏やかで落ち着いて過ごせる日です。好きなことに集中して、読書や映画を楽しむのにぴったりなタイミングですよ♪',
            
            'アンバランス期' => '今日はアンバランス期です。少し体調が不安定で、気分に浮き沈みがあるかもしれません。無理をせず、ゆったりとした時間を過ごすのがおすすめです♪',
            
            '不明な期間' => '今日は特別な日かもしれませんね。体調に耳を傾けて、無理をせずに過ごしてください。必要であれば、しっかりと休息を取りましょう。'
        ];

        return $comments[$phase] ?? '今日はどんな日になるか楽しみですね！自分らしく、素敵な一日を過ごしてくださいね♪';
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
