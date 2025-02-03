<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeautyService;

class Maincontroller extends Controller
{
    public function getMain() {
        // セッションのuser_idと一致するbeauty_serviceテーブルのuser_idを取得
        $userid = session('member_id');
        $names = BeautyService::where('user_id', $userid)->get()->pluck("name");
        $cycles = BeautyService::where('user_id', $userid)->get()->pluck("cycle");
        // dd($cycle);
        return view('main', compact('names'));
    }
}
