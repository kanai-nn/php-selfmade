@extends('layouts.app')

@section('title', 'トップ画面')

@section('content')
<div class="container">
  
  <div class="top-container">
    <div class="left-box">

      <div class="bear-box">
        <div class="bear-img">
          <img src="{{ asset('img/bear2.png') }}">
        </div>
        <div class="bearTextBox">
          <p>{{ $comment }}</p>
        </div>
      </div> <br><br>

      
      <div class="calender-box">
        <div id="calendar"></div>
      </div>

      <div id="eventModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>イベントを追加</h3>
            <form id="eventForm">
                <label>イベントタイトル:</label><br>
                <input type="text" id="eventTitle" required><br><br>
                <label>日付:</label><br>
                <input type="date" id="eventDate" required><br><br>
                <button type="submit" style="padding: 10px 15px; background-color:rgba(231, 175, 208, 0.82); color: #30303dc8; border: none; cursor: pointer; border-radius: 4px;">登録</button>
            </form>
        </div>
      </div>

    </div>

    <div class="right-box">

      <div class="solonInfo-boxes">

        @foreach($calculatedCycles as $data) 
          <div class="salonInfo-small-box">
            <br><h2>・{{  $data['service_name']  }}<br>まであと{{ $data['adjusted_cycle'] }}日</h2><br>
          </div>
          <br>
        @endforeach

      </div>
      <div class="button-area">
        <button id="openModal">イベントを作成する</button>
        <button><a href="{{ route('menstrualcorrect') }}">月経修正ページへ→</a></button><br><br>
        <button><a href="{{ route('beautyCorrect') }}">美容項目追加ページへ→</a></button><br><br>
        <button>
          <a href="{{ route('beautyGet', ['id' => $data['id']]) }}">美容項目削除ページへ</a>
        </button>
      </div>
    </div>
  </div>


  <!-- <div class="bottom-container">
    <div class="salonInfoBox">
      <h3>サロン名</h3>
      <p>ACHFILO[アフィーロ]</p>
      <h3>サロンタイプ</h3>
      <p>ヘアーサロン</p>
      <h3>サロン住所</h3>
      <p>東京都渋谷区渋谷１丁目２２−３ ルアン渋谷ビル 1階</p>
      <h3>サロン詳細</h3>
      <p>多くの芸能人がリピートする人気店舗！通算20万人の施術実績の<br>髪質改善トリートメントがおススメ！</p>
    </div>
    <div class="salonInfoBox">
      <h3>サロン名</h3>
      <p>I-nails</p>
      <h3>サロンタイプ</h3>
      <p>ネイルサロン</p>
      <h3>サロン住所</h3>
      <p>東京都中央区銀座1-4-3</p>
      <h3>サロン詳細</h3>
      <p>【大人ニュアンスネイル】がテーマの人気サロン！</p>
    </div>
    <div class="salonInfoBox">
      <h3>サロン名</h3>
      <p>ESPERANZA</p>
      <h3>サロンタイプ</h3>
      <p>エステサロン</p>
      <h3>サロン住所</h3>
      <p>東京都新宿区3‐34‐12下菊ビル6階</p>
      <h3>サロン詳細</h3>
      <p>セサミオイルのみをたっぷり使った瘦身インドエステ<br>最新最上位機種ER45を利用したインディバが人気な店舗！</p>
    </div>
  </div> -->


  <div class="bottom-container">
    @foreach($salons as $salon)
      <div class="salonInfoBox">
        <h3>サロン名</h3>
        <p>{{ $salon->name }}</p>

        <h3>サロンタイプ</h3>
        <p>{{ $salon->type }}</p>

        <h3>サロン詳細</h3>
        <p>{{ $salon->data }}</p>

        <h3>サロン画像</h3>
        <img src="{{ asset('storage/salon_images/' . basename($salon->img)) }}" alt="サロン画像" width="300">
      </div>
    @endforeach
  </div>

</div>
@endsection

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: '/calendar/user-periods',

        eventClick: function(info) {
            if (confirm('このイベントを削除してもよろしいですか？')) {
                deleteEvent(info.event.id);
            }
        }
    });
    calendar.render();

     // モーダルウィンドウの制御
    var modal = document.getElementById('eventModal');
    var openModalButton = document.getElementById('openModal');
    var closeModalButton = document.querySelector('.close');

    openModalButton.onclick = function() {
        modal.style.display = 'block';
    }

    closeModalButton.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // フォーム送信処理
    document.getElementById('eventForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var title = document.getElementById('eventTitle').value;
        var date = document.getElementById('eventDate').value;

        fetch('{{ url("/events/store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                title: title,
                start: date,
                end: date
            })
        })
        .then(response => response.json())
        .then(data => {
            calendar.addEvent({
                title: title,
                start: date,
                end: date
            });

            modal.style.display = 'none';
            document.getElementById('eventForm').reset();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('イベント登録中にエラーが発生しました。');
        });
      });

      // イベント削除用の関数
      function deleteEvent(eventId) {
        fetch(`/events/${eventId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            calendar.refetchEvents();  // カレンダーのイベントを再読み込み
        })
        .catch(error => {
            console.error('Error:', error);
            alert('イベント削除中にエラーが発生しました。');
        });
      }

  });

</script>



