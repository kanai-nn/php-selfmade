@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="correction-card">
     
        <!-- <div class="correction-card-top">
            <div class="bear-img">
                <img src="{{ asset('img/bear4.png') }}">
            </div>
            <div class="bearTextBox">
                <p>生理がずれてしまうことはよくあるから安心してね♪<br>新しい開始日を入力してね</p>
            </div>
        </div> -->

        <h2>新しい月経開始日と月経周期を入力してください。</h2>

        <form method="POST" action="{{ route('menstrualcorrect') }}">
        @csrf
        <div class="bear-img">
                <img src="{{ asset('img/bear4.png') }}">
        </div>

        <label for="start_date">月経開始日はいつですか？</label><br><br>
        @if($errors->has('start_date'))<sapn>{{ $errors->first('start_date') }}</span><br>@endif
        <input type="date" id="start_date" name="start_date"><br><br>

        <label for="m_cycle">月経周期は大体何日ですか？</label><br><br>
        @if($errors->has('m_cycle'))<sapn>{{ $errors->first('m_cycle') }}</span><br>@endif
        <input type="text" id="m_cycle" name="m_cycle"><br><br><br><br>
        <button><a href="{{ route('main') }}">戻る→</a></button>
        <button type="submit">完了→</button>

        </form>

         

    </div>
</div>
@endsection