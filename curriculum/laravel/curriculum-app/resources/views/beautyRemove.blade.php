@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
    <div class="correction-card">
     
      <h2>美容項目修正ページ</h2>

      <div class="fixTable">

        <table border="1" style="border-collapse: collapse; border-color: #30303dc8">
          <thead>
            <th>美容項目</th>
            <th>周期</th>
            <th>作成日時</th>
            <th></th>
            <th></th>
          </thead>

          <tbody>
            @foreach($rows as $row)
              <tr>
                <td>{{ $row->name }}</td>
                <td>
                  <form method="POST" action="{{ route('beauty.update', $row->id) }}">
                    @csrf
                    <input type="text" name="cycle" value="{{ $row->cycle }}" required>
                    <button type="submit">更新</button>
                  </form>
                </td>
                <td>{{ $row->created_at->format('Y-m-d') }}</td>
                <td>
                  <form method="POST" action="{{ route('beautyRemovedone', ['id' => $row->id]) }}">
                      @csrf
                      <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>

        </table><br><br>  

      </div>
         
      <button><a href="{{ route('main') }}">戻る→</a></button>

    </div>
</div>
@endsection