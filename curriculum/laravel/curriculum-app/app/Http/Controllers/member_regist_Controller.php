<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalonArea;
use App\Models\Member_new;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistRequest;

class member_regist_Controller extends Controller
{
    public function getRegister() {
        $areas = SalonArea::all();
      
        return view('register', compact('areas'));
    }

    public function getConfirm(RegistRequest $request) {
        // $areas = $request->area->area;
        // dd($request);
        $data = $request->validated();
        $areaName = salonArea::find($data['area'])->area;
        return view('confirm', compact('data', 'areaName'));
    }

    public function getComplete(Request $request) {
        Member_new::create ([
            'user_id' => $request->user_id,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'role' => $request->role,
            'salon_area_id' => $request->area,
        ]);
        
        return view('complete');
    }
}
