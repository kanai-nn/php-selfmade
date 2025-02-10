<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FirstRegistRequest;
use Carbon\Carbon;
use App\Models\Menstrual;

class CorrectController extends Controller
{
    public function getform() {
        if (!session()->has('member_id')) {
            return redirect('/login');
        }
        // dd(session('member_id'));
        return view('menstrualcorrection');
    }

    public function correct(FirstRegistRequest $request) {
        $data = $request->validated();
        $userid = session('member_id');
        $user = Menstrual::where('user_id', $userid)->first();
        // dd($user);

        $next_period = Carbon::parse($request->start_date)->addDays($request->m_cycle);

        $user->update([
            'start_date' => $request->start_date,
            'cycle' => $request->m_cycle,
            'next_period' => $next_period->format('Y-m-d'),
        ]);

        return redirect("main"); 

    }
}
