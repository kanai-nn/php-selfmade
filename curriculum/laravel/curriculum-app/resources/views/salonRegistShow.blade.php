@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="salonRegistCard">
      <form action="{{ route('salonRegistConfirm') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="salonName">サロン名</label><br>
        <input type="text" name="name" id="name"><br><br>

        <laber for="area">サロンエリア</laber><br>
        <select name="area" id="area">
          <option value="">選択してください</option>
          @foreach($areas as $area) 
            <option value="{{ ($area->id) }}">{{ ($area->area) }}</option>
          @endforeach
        </select><br><br>
        
        <laber for="type">サロンタイプ</laber><br>
        <input type="text" name="type" id="type"><br><br>

        <laber for="data">サロン詳細</laber><br>
        <input type="text" name="data" id="data" value="{{ old('data') }}"><br><br>

        <laber for="file">サロン画像</laber><br>
        <input type="file" name="file" id="file"><br><br>

        <button><a href="{{ route('salonInfo') }}">戻る</a></button>
        <button type="submit">次へ</button>
      </form>
    </div>
</div>
@endsection