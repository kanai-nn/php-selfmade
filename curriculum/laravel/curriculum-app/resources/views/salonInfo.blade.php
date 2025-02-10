@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  
  <div class="UserShowTable">

    <table border="1" style="border-collapse: collapse; border-color: #30303dc8; width: 60vw; margin: auto;">
      <thead>
        <th>サロン名</th>
        <th>サロンエリアID</th>
        <th>サロンタイプ</th>
        <th>サロン詳細</th>
        <th>サロン画像パス</th>
        <th></th>
        <th></th>
      </thead>

      <tbody>
        @foreach($salons as $salon)
          <tr>
            <td>{{ $salon->name}}</td>
            <td>{{ $salon->area_id}}</td>
            <td>{{ $salon->type}}</td>
            <td>{{ $salon->data}}</td>
            <td>{{ $salon->img}}</td>
            <td>{{ $salon->created_at}}</td>
            <td>                  
              <form method="POST" action="{{ route('salonRemove', ['id' => $salon->id]) }}">
                @csrf
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
              </form>
            </td>
            <td>                  
              <button><a href="{{ route('salon.edit', $salon->id) }}">編集</a></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <button style="margin-top: 30px; margin-bottom: 30px"><a href="{{ route('salonRegistShow') }}">サロン情報新規登録へ→</a></button>
    <button style="margin-top: 30px;"><a href="{{ route('management') }}">全ユーザー一覧へ→</a></button>

  </div>


</div>
@endsection




