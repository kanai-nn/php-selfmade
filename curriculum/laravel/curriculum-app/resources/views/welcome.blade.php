@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="intro">
        <h2>キレイのタイミング、Miyondaでみつけよう</h2>
        <p>
        月経周期のリズムに合わせた美容ケアをサポートするMiyonda。<br>
        月経周期を管理しながら、ネイルや脱毛、エステのスケジュールも一元管理します。美容と健康、どちらも大切にしたいあなたにぴったりのサービスです。
        </p>
        <div class="welcome-button-box">
            <a href="{{ route('register') }}" class="btn">初めての方はこちら→</a>
            <a href="{{ route('login') }}" class="btn">ご利用の方はこちら→</a>
        </div>
        <div class="img">
            <img src="{{ asset('img/bear1.png') }}" alt="">
        </div>
    </div>
</div>
@endsection