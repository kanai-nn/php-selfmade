<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_new;
use Illuminate\Support\Facades\Hash;

class ManagementAddController extends Controller
{
    public function add() {
        return view('managementAdd');
    }

    
    public function managementAddUser(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|unique:members',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ],
        [
            'user_id.unique' => 'このIDは既に存在します。',
            'user_id.required' => '必須入力です。',
            'password.required' => '必須入力です。',
            'password.confirmed'=>'パスワードが一致しません。',
            'password_confirmation.required' => '必須入力です。',
        ]);

        $userId = session('member_id');

        Member_new::create ([
            'user_id' => $request->user_id,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        
        return view('management');


    }
}
