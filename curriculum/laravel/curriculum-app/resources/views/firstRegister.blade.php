@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  <div class="first-regist-card">
    <h2> はじめにあなたのことについて<br>教えてください。</h2>

    <form method="POST" action="{{ route('firstRegist') }}" >
    @csrf
      <div class="start-date-input first-regist-input">
        <label for="start_date">直近の月経開始日はいつですか？</label><br>
        @if($errors->has('start_date'))<sapn>{{ $errors->first('start_date') }}</span><br>@endif
        <input id="start_date" type="date" name="start_date" value="{{ old('start_date') }}">
      </div>

      <div class="m-cycle-input first-regist-input">
        <label for="cycle">月経周期は大体何日ですか？<br>（例：30日→30と入力）</label><br>
        @if($errors->has('m_cycle'))<span>{{ $errors->first('m_cycle') }}</span><br>@endif
        <input id="m_cycle" type="text" name="m_cycle" value="{{ old('m_cycle') }}">
      </div>


      <div id="beauty-inputs">
        <div class="b-cycle-input first-regist-input" id="b-cycle-input">
          <label for="beauty">スケジュールを管理したい美容項目と<br>美容周期を教えてください。 </label><br>
          @if($errors->has('beauty_items.*.name'))<span>{{ $errors->first('beauty_items.*.name') }}</span><br>@endif
          @if($errors->has('beauty_items.*.cycle'))<span>{{ $errors->first('beauty_items.*.cycle') }}</span><br>@endif
          <input id="name" type="text" name="beauty_items[0][name]" placeholder="美容項目" value="{{ old('beauty_items.0.name') }}">
          <input id="b_cycle" type="text" name="beauty_items[0][cycle]" placeholder="美容周期" value="{{ old('beauty_items.0.cycle') }}"><br><br>
          <input id="name" type="text" name="beauty_items[1][name]" placeholder="美容項目" value="{{ old('beauty_items.1.name') }}">
          <input id="b_cycle" type="text" name="beauty_items[1][cycle]" placeholder="美容周期" value="{{ old('beauty_items.1.cycle') }}"><br>
        </div>
      </div>
      <!-- <button type="submit" id="add-input">項目を追加</button><br><br> -->
      <button type="submit">次へ</button>
    </form>
  </div>
</div>
@endsection
