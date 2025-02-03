@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  <div class="regist-card">
    <h2> 登録内容にお間違いはありませんか？</h2>
    <form action="{{ route('complete') }}" method="POST">
      @csrf
      <div class="user-id-input regist-input">
        <laber for="user_id">{{ __('ユーザーID') }}</laber><br>
        {{$data['user_id']}}
      </div>

      <div class="age-input regist-input">
        <laber for="age">{{ __('年齢') }}</laber><br>
        {{ $data['age'] }}
      </div>

      <div class="area-input regist-input">
        <laber for="area">{{ __('よく行くサロンエリア') }}</laber><br>
        {{ $areaName }}
      </div>

      <input id="user_id" type="hidden" class="" name="user_id" value="{{ $data['user_id'] }}">

      <input id="password" type="hidden" class="" name="password" value="{{ $data['password'] }}">

      <input id="age" type="hidden" class="" name="age" value="{{ $data['age'] }}">

      <input id="role" type="hidden" class="" name="role" value="1">

      <input id="area" type="hidden" class="" name="area" value="{{ $data['area'] }}">
      
      <button type="submit">次へ</button>
    </form>
    
  </div>
</div>
@endsection