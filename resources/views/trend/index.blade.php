@extends('layouts.app')
  @section('content')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">投票可能なトレンド一覧</h3>
      </div>
    </div>
  {{ Form::open(['action' => 'TrendController@Radio_voting']) }}
    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        <table class="table table-striped table-hover">
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
              <div class="text-center">
              @switch($loop->iteration)
                @case(1)
                  <img src="{{ asset('/images/ranking01.png') }}" class="img-responsive" width="20%" height="20%" alt="ランク1">
                  @break
                @case(2)
                  <img src="{{ asset('/images/ranking02.png') }}" class="img-responsive" width="20%" height="20%"  alt="ランク1">
                  @break
                @case(3)
                  <img src="{{ asset('/images/ranking03.png') }}" class="img-responsive" width="20%" height="20%"  alt="ランク1">
                  @break
                @default
                  {{ $loop->iteration }}
              @endswitch
            </div>
            </td>

            <td>
              {{-- Twitteへのリンク、トレンド名 --}}
              <a href="{{ $trend->url }}">{{ $trend->name }}</a>
            </td>

            {{-- 喜怒哀楽ボタンの実装 --}}
            <td>
              <div class="text-center">

              {{-- 喜ボタン --}}
              {{-- ファーザード利用のテスト --}}
              {{-- <form action="trend/happy_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()"> <input type="hidden" name="_method" value="PUT"> --}}

                @if(Auth::user()->is_vote_trends($trend->id))
                  {{ $trend->sum_votes_happy }}
                @else
                {{-- ラジオボタンに変更テスト <button type="submit" class="btn-warning btn-sm btn-happy">喜</button> --}}
                {{ Form::radio($trend->id,'happy,'.$trend->id,false) }}
                @endif
                @csrf
              {{-- ファーザード利用のテスト </form> --}}
            </div>
            </td>
            <td>
              <div class="text-center">

              {{-- 怒ボタン --}}
              {{--<form action="trend/angry_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()"> <input type="hidden" name="_method" value="PUT"> --}}
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_angry}}
                @else
                {{ Form::radio($trend->id,'angry,'.$trend->id,false) }}
                {{-- <button type="submit" class="btn-danger btn-angry">怒</button> --}}

                @endif
                @csrf
              </div>
            </td>
            <td>
              {{-- 哀ボタン --}}
              <div class="text-center">

              {{-- <form action="trend/blue_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()">   <input type="hidden" name="_method" value="PUT"> --}}
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_blue}}
                @else
                {{ Form::radio($trend->id,'blue,'.$trend->id,false) }}
                {{-- <button type="submit" class="btn-primary btn-blue">哀</button> --}}
                @endif
                @csrf
              </div>
            </td>
            <td>
              {{-- 楽ボタン --}}
              <div class="text-center">

              {{-- <form action="trend/fun_voting/{{$trend->id}}" method="post" onSubmit="return dualclick()"> <input type="hidden" name="_method" value="PUT"> --}}
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_fun}}
                @else
                {{ Form::radio($trend->id,'fun,'.$trend->id,false) }}
                {{-- <button type="submit" class="btn-success btn-fun">楽</button> --}}
                @endif
                @csrf
              </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    {{ Form::submit('投票', ['class' => 'btn btn-success btn-submit']) }}
    {{ Form::close() }}
  <a class="btn_share" href="https://twitter.com/intent/tweet?url=http://voting_emotions.example/trend&text=%20Twitteトレンド投票しました!%20&hashtags=トレンドエモート" target="_blank" rel="nofollow">
    <i class="fab fa-twitter skyblue fa-2x"></i></a>

    @endsection
