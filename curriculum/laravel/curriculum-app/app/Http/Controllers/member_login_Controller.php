<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_new;
use Illuminate\Support\Facades\Hash;
use App\Models\Menstrual;

class member_login_Controller extends Controller
{
    public function getShowLogin() {
        // phpinfo();
        return view('login');
       
    }

    public function login(Request $request) {
        // dd($request->all());
        $userId = $request->input('user_id');
        $password = $request->input('password');

        $member = Member_new::where('user_id', $userId)->first();

     
        if($member->role == 1) {

            if ($member && Hash::check($password, $member->password)) {
                //セッションでログイン状態を保持 
                session(['member_id' => $member->user_id]);
                $sessionid = session('member_id');
                $menstrual = Menstrual::where('user_id', $sessionid)->first();
                
                if($menstrual) {
                    return redirect()->route('main');
                } else {
                    return redirect()->route('firstRegist');
                }
            }

        }else if($member->role == 0) {
            if ($member && Hash::check($password, $member->password)) {
                //セッションでログイン状態を保持 
                session(['member_id' => $member->user_id]);
                $sessionid = session('member_id');
                return redirect()->route('management');
            }
        }



   
        return back()->withErrors(['login' => 'ユーザーIDまたはパスワードが正しくありません']);
    }

}
