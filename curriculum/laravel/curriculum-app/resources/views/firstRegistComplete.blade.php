@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">

  <div class="intro">
    <h2>初期登録ありがとうございます。<br>こちらから<span>ふわくま</span>がご案内いたします。</h2>
    <div class="bear-img-bow">
          <img src="{{ asset('img/bear3.png') }}">
    </div><br><br>
    <button><a href="{{ route('main') }}" class="">完了→</a></button>
  </div>

</div>
@endsection



