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

        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ], [
            'user_id.required' => 'ユーザーIDは必須です。',
            'password.required' => 'パスワードは必須です。',
        ]);

        $userId = $request->input('user_id');
        $password = $request->input('password');

        $member = Member_new::where('user_id', $userId)->first();

        if (!$member || !Hash::check($password, $member->password)) {
            // ユーザーが存在しないか、パスワードが一致しない場合のエラー
            return redirect()->route('login')->withErrors([
                'login_error' => 'ユーザーIDまたはパスワードが正しくありません。',
            ]);
        }
        if($member && $member->role == 1) {

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

        }else if($member && $member->role == 0) {
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
