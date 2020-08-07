@extends('layouts.app')
  @section('content')
  <!--modalモーダルウィンドウ-->
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">投票可能なトレンド一覧</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        <table class="table text-center">
          <tr>
            <th class="text-center">トレンドランキング</th>
            <th class="text-center">トレンド名</th>
            <th class="text-center">喜</th>
            <th class="text-center">怒</th>
            <th class="text-center">哀</th>
            <th class="text-center">楽</th>
          </tr>
          @foreach($trends as $trend)
          <tr>

            <td>
              {{-- ランキングの添え字 --}}
              {{ $loop->iteration }}
            </td>

            <td>
              {{-- Twitteへのリンク、トレンド名 --}}
              <a href="{{ $trend->url }}">{{ $trend->name }}</a>
            </td>

            {{-- 喜怒哀楽ボタンの実装 --}}
            <td>
              {{-- 喜ボタン --}}
              {{-- 実験 <input type="button" class="btn btn-warning btn-happy" data-toggle="modal" data-target="#modal{{$trend->id}}" value="喜"> --}}

              <form action="trend/happy_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{ $trend->sum_votes_happy }}
                @else
                <button type="submit" class="btn-warning btn-sm btn-happy">喜</button>
                @endif
                @csrf
              </form>
            </td>
            <td>
              {{-- 怒ボタン --}}
              <form action="trend/angry_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_angry}}
                @else
                <button type="submit" class="btn-danger btn-angry">怒</button>
                @endif
                @csrf
              </form>
            </td>
            <td>
              {{-- 哀ボタン --}}
              <form action="trend/blue_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_blue}}
                @else
                <button type="submit" class="btn-primary btn-blue">哀</button>
                @endif
                @csrf
              </form>
            </td>
            <td>
              {{-- 楽ボタン --}}
              <form action="trend/fun_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_fun}}
                @else
                <button type="submit" class="btn-success btn-fun">楽</button>
                @endif
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

    {{-- ダイアログの実装 --}}
    @section('script')
      <script>
      $(function(){
      $(".btn-happy").click(function(){
      if(confirm("喜に投票します。よろしいですか？")){
      //投票
      }else{
      //キャンセル
      return false;
      }
      });
      });
      </script>

      <script>
      $(function(){
      $(".btn-angry").click(function(){
      if(confirm("怒に投票します。よろしいですか？")){
      //投票
      }else{
      //キャンセル
      return false;
      }
      });
      });
      </script>

      <script>
      $(function(){
      $(".btn-blue").click(function(){
      if(confirm("哀に投票します。よろしいですか？")){
      //投票
      }else{
      //キャンセル
      return false;
      }
      });
      });
      </script>

      <script>
      $(function(){
      $(".btn-fun").click(function(){
      if(confirm("楽に投票します。よろしいですか？")){
      //投票
      }else{
      //キャンセル
      return false;
      }
      });
      });
      </script>

      <script>
      //二度押しできないようにする。
      var check=0;
      function dualclick() {
        if(check==0){
          check=1;
        }
        else{
            alert("処理中です。少々お待ちください。");
            return false;
        }
      }
      </script>

    @endsection

    @endsection
