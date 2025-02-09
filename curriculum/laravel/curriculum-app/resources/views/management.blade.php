@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  
  <div class="UserShowTable">

    <table border="1" style="border-collapse: collapse; border-color: #30303dc8; width: 60vw; margin: auto;">
      <thead>
        <th>ユーザーID</th>
        <th>ロール</th>
        <th>年齢</th>
        <th>サロンエリア</th>
        <th>登録日時</th>
        <th></th>
      </thead>

      <tbody>
        @foreach($members as $member)
          <tr>
            <td>{{ $member->user_id}}</td>
            <td>{{ $member->role}}</td>
            <td>{{ $member->age}}</td>
            <td>{{ $member->salonArea->area ?? '未設定'}}</td>
            <td>{{ $member->created_at}}</td>
            <td>                  
              <form method="POST" action="{{ route('userRemove', ['id' => $member->id]) }}">
                @csrf
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>


</div>
@endsection




