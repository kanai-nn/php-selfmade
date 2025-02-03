<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeautyService;
use App\Models\Menstrual;
use App\Http\Requests\FirstRegistRequest;

class FirstRegistController extends Controller
{
    public function getRegister() {
        // dd(session('member_id'));
        return view ('firstRegister');
    }

    public function firstRegister(FirstRegistRequest $request) {
        $data = $request->validated();
        $userid = session('member_id');
        // dd($u);
        Menstrual::create([
            'user_id' => $userid,
            'start_date' => $request->start_date,
            'cycle' => $request->m_cycle,
        ]);

        foreach ($request['beauty_items'] as $item) {
            BeautyService::create([
                'user_id' => $userid,
                'name' => $item['name'],
                'cycle' => $item['cycle'],
            ]);
        }

        return redirect()->route('firstRegistComplete'); 
    }

    public function getComplete() {
        
        return view ('firstRegistComplete');
    }
}
