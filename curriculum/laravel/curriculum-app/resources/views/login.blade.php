@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="login-card">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <h2>ログイン</h2>
            @if($errors->has('login_error'))<span>{{ $errors->first('login_error') }}</span><br>@endif


            <div class="user-id-input regist-input">
                <laber for="user_id">{{ __('ユーザーID') }}</laber><br>
                @if($errors->has('user_id'))<span>{{ $errors->first('user_id') }}</span><br>@endif
                <input id="user_id" type="text" name="user_id">
            </div>

            <div class="password-input regist-input">
                <laber for="password">{{ __('パスワード') }}</laber><br>
                @if($errors->has('password'))<span>{{ $errors->first('password') }}</span><br>@endif
                <input id="password" type="password" name="password">
            </div>
            <button type="submit">次へ</button>
        </form>
    </div>
</div>
@endsection