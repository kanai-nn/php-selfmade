<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FirstRegistRequest;
use App\Models\BeautyService;

class BeautyCorrectController extends Controller
{
    public function getform() {
        return view ('BeautyCorrect');
    }

    public function add(Request $request) {
        $validated = $request->validate([
            'beauty_items.*.name' => 'required',
            'beauty_items.*.cycle' => 'required|numeric',
        ],
        [
            'beauty_items.*.name.required' => '必須入力です。',
            'beauty_items.*.cycle.numeric' => '半角数字で入力してください。',
        ]);


        $userid = session('member_id');

        foreach ($request['beauty_items'] as $item) {
            BeautyService::create([
                'user_id' => $userid,
                'name' => $item['name'],
                'cycle' => $item['cycle'],
            ]);
        }

        return redirect()->route('main'); 
    }
}


