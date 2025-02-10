@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  <div class="salonRegistCard">
    <form action="{{ route('salonRegist') }}" method="POST">
      @csrf
        <laber for="name">サロン名</laber><br>
        {{$request->name}}<br><br>

        <laber for="area">サロンエリア</laber><br>
        {{ $areaName }}<br><br>

        <laber for="type">サロンタイプ</laber><br>
        {{ $request->type }}<br><br>

        <laber for="data">サロン詳細</laber><br>
        {{ $request->data }}<br><br>

        <laber for="path">サロン画像</laber><br>
        {{ $publicPath }}<br><br>

        <input id="name" type="hidden" class="" name="name" value="{{ $request->name }}">

        <input id="area" type="hidden" class="" name="area" value="{{ $request->area }}">

        <input id="type" type="hidden" class="" name="type" value="{{ $request->type }}">

        <input id="data" type="hidden" class="" name="data" value="{{ $request->data }}">

        <input id="path" type="hidden" class="" name="path" value="{{ $publicPath  }}">
        
        <button type="submit">次へ</button>
    </form>
    
  </div>
</div>
@endsection