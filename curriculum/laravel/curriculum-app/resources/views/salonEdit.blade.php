@extends('layouts.app')

@section('content')
<div class="contents" style="padding:30px;">
  <div class="salonRegistCard">
    <h2>サロン情報編集</h2>
    <form action="{{ route('salon.update', $salon->id) }}" method="POST">
        @csrf
        <label for="name">サロン名:</label><br>
        @if($errors->has('name'))<span>{{ $errors->first('name') }}</span><br>@endif
        <input type="text" name="name" id="name" value="{{ $salon->name }}"><br><br>

        <label for="area_id">サロンエリアID:</label><br>
        @if($errors->has('area_id'))<span>{{ $errors->first('area_id') }}</span><br>@endif
        <input type="text" name="area_id" id="area_id" value="{{ $salon->area_id }}"><br><br>

        <label for="type">サロンタイプ:</label><br>
        @if($errors->has('type'))<span>{{ $errors->first('type') }}</span><br>@endif
        <input type="text" name="type" id="type" value="{{ $salon->type }}"><br><br>

        <label for="data">サロン詳細:</label><br>
        @if($errors->has('data'))<span>{{ $errors->first('data') }}</span><br>@endif
        <textarea name="data" id="data" rows="4" style="width:40%;">{{ $salon->data }}</textarea><br><br>

        <button type="submit">更新する</button>

    </form>
  </div>
</div>
@endsection
