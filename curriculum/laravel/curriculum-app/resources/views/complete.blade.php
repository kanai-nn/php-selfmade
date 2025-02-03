@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">

    <div class="complete-card">
        <h2>ユーザ登録が完了しました。</h2>
        <button><a href="{{ route('login') }}" class="">完了→</a></button>
    </div>

</div>
@endsection