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
          <p>こんにちは。これは例です。ふわくまのコメントを記載してください。</p>
        </div>
      </div>

      
      <div class="calender-box">
        <div id="calendar"></div>
      </div>
    </div>

    <div class="right-box">

      <div class="solonInfo-boxes">

        @foreach($names as $name) 
          <div class="salonInfo-small-box">
            <br><h2>・{{ $name }}<br>まであと何日</h2><br>
          </div>
          <br>
        @endforeach

      </div>
      <div class="button-area">
        <button><a href="">月経修正ページへ→</a></button><br><br>
        <button><a href="">美容項目修正ページへ→</a></button>
      </div>
    </div>
  </div>


  <div class="bottom-container">

  </div>

</div>
@endsection

<script>

  document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
  });
  calendar.render();
  });

</script>



