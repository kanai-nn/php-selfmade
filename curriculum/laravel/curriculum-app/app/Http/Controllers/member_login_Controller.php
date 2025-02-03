<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_new;
use Illuminate\Support\Facades\Hash;

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
        

        if ($member && Hash::check($password, $member->password)) {
            //セッションでログイン状態を保持 
            session(['member_id' => $member->user_id]);
            return redirect()->route('main'); 
        }
   
        return back()->withErrors(['login' => 'ユーザーIDまたはパスワードが正しくありません']);
    }

}
