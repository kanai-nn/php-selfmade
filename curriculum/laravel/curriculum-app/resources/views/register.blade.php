@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  <div class="regist-card">
    <h2> Miyondaへようこそ！<br>アカウントを作成してはじめよう</h2>
    <form method="POST" action="{{ route('confirm') }}" >
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

      <div class="age-input regist-input">
        <laber for="age">{{ __('年齢') }}</laber><br>
        @if($errors->has('age'))<span>{{ $errors->first('age') }}</span><br>@endif
        <input id="age" type="text" class="" name="age" value="{{ old('age') }}">
      </div>

      <div class="area-input regist-input">
        <laber for="area">{{ __('よく行くサロンエリア') }}</laber><br>
        @if($errors->has('area'))<span>{{ $errors->first('area') }}</span><br>@endif
        <select name="area" id="area">
          <option value="">選択してください</option>
          @foreach($areas as $area) 
            <option value="{{ ($area->id) }}">{{ ($area->area) }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit">次へ</button>


    </form>
  </div>
</div>
@endsection