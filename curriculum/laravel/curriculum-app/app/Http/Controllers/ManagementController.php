<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_new;
use App\Models\BeautyService;
use App\Models\Event;
use App\Models\Menstrual;

class ManagementController extends Controller
{
    public function getform() {
        
        $members = Member_new::with('salonArea')->get();

        return view('management', compact('members'));
    }

    public function userRemove($id) {
        $member = Member_new::find($id);
    
        if ($member) {
            // 1. beauty_services_table の関連データを削除
            \App\Models\BeautyService::where('user_id', $member->user_id)->delete();
            \App\Models\Menstrual::where('user_id', $member->user_id)->delete();
            \App\Models\Menstrual::where('user_id', $member->user_id)->delete();
            \App\Models\Event::where('user_id', $member->user_id)->delete();
            
            // 2. members テーブルのレコードを削除
            $member->delete();
        }
    
        return redirect()->back();
    }

}
