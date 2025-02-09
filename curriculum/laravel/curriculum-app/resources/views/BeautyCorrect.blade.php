@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="correction-card">
     
        <h2>新しい美容項目と美容周期を入力してください。</h2>

        <form method="POST" action="{{ route('beautyCorrect') }}">
          @csrf
          <div class="bear-img">
                  <img src="{{ asset('img/bear4.png') }}">
          </div>
          @if($errors->has('beauty_items.*.name'))<span>{{ $errors->first('beauty_items.*.name') }}</span><br>@endif
          @if($errors->has('beauty_items.*.cycle'))<span>{{ $errors->first('beauty_items.*.cycle') }}</span><br>@endif
          <input id="name" type="text" name="beauty_items[0][name]" placeholder="美容項目" value="{{ old('beauty_items.0.name') }}"><br><br>
          <input id="b_cycle" type="text" name="beauty_items[0][cycle]" placeholder="美容周期" value="{{ old('beauty_items.0.cycle') }}"><br><br><br>

          <button><a href="{{ route('main') }}">戻る→</a></button>
          <button type="submit">完了→</button>

        </form>
         

    </div>
</div>
@endsection