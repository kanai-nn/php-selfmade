@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  
  <div class="regist-card">
    <h2> 管理ユーザー追加</h2>
    <form method="POST" action="{{ route('managementAddUser') }}" >
    @csrf
      <div class="user-id-input regist-input">
        <laber for="user_id">{{ __('ユーザーID') }}</laber><br>
        @if($errors->has('user_id'))<span>{{ $errors->first('user_id') }}</span><br>@endif
        <input id="user_id" type="text" class="" name="user_id" value="{{ old('user_id') }}">
      </div>

      <div class="password-input regist-input">
        <laber for="password">{{ __('パスワード') }}</laber><br>
        @if($errors->has('password'))<span>{{ $errors->first('password') }}</span><br>@endif
        <input id="password" type="password" class="" name="password" value="{{ old('password') }}">
      </div>

      <div class="password-input regist-input">
        <laber for="password_confirmation">{{ __('パスワード確認') }}</laber><br>
        @if($errors->has('password_confirmation'))<span>{{ $errors->first('password_confirmation') }}</span><br>@endif
        <input id="password_confirmation" type="password" class="" name="password_confirmation" value="{{ old('password-input') }}">
      </div>

      <input id="role" type="hidden" class="" name="role" value="0">

      <button><a href="{{ route('management') }}">戻る</a></button>
      <button type="submit">完了</button>


    </form>
  </div>

</div>
@endsection




