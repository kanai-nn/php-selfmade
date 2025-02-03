<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function logout(Request $request)
    {
        // セッションデータを削除
        $request->session()->flush();

        // セッションIDを再生成してセキュリティを確保
        $request->session()->regenerateToken();

        // ログインページなどにリダイレクト
        return redirect()->route('login');
    }
}
