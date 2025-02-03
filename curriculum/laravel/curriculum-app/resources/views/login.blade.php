@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="login-card">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <h2>ログイン</h2>
            <div class="user-id-input regist-input">
                <laber for="user_id">{{ __('ユーザーID') }}</laber><br>
                <input id="user_id" type="text" name="user_id">
            </div>

            <div class="password-input regist-input">
                <laber for="password">{{ __('パスワード') }}</laber><br>
                <input id="password" type="password" name="password">
            </div>
            <button type="submit">次へ</button>
        </form>
    </div>
</div>
@endsection