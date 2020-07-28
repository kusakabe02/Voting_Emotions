@extends('layouts.app')
  @section('content')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
            <th class="text-center">トレンドNo.</th>
            <th class="text-center">トレンド名</th>
            <th class="text-center">喜</th>
            <th class="text-center">怒</th>
            <th class="text-center">哀</th>
            <th class="text-center">楽</th>
          </tr>
          @foreach($trends as $trend)
          <tr>
            <!--今はIDを取っているが、1回の塊（50個）表示したいので改良予定-->
            <td>
              <a href="/trend/{{ $trend->id }}/edit">{{ $trend->id }}</a>
            </td>
            <!--トレンド名。Twitterへのリンクになっている-->
            <td>{{ $trend->name }}</td>
            <!--コピペデリートボタン
            <td>
              <form action="/trend/{{ $trend->id }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
              </form>
            </td>
            -->

            <!--喜怒哀楽ボタンの実装-->
            <td>
              {{-- 喜ボタン --}}
              {{-- 実験 <input type="button" class="btn-warning" data-toggle="modal""" data-target="#modal{{$trend->id}}" value="喜"> --}}
              <form action="trend/happy_voting/{{$trend->id}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_happy}}
                @else
                <button type="submit" class="btn-warning">喜</button>
                @endif
                @csrf
              </form>
            </td>
            <td>
              {{-- 怒ボタン --}}
              <form action="trend/votes_angry_voting/{{$trend->id}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_angry}}
                @else
                <button type="submit" class="btn-danger">怒</button>
                @endif
                @csrf
              </form>
            </td>
            <td>
              {{-- 哀ボタン --}}
              <form action="trend/votes_blue_voting/{{$trend->id}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_blue}}
                @else
                <button type="submit" class="btn-primary">哀</button>
                @endif
                @csrf
              </form>
            </td>
            <td>
              {{-- 楽ボタン --}}
              <form action="trend/votes_fun_voting/{{$trend->id}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @if(Auth::user()->is_vote_trends($trend->id))
                  {{$trend->sum_votes_blue}}
                @else
                <button type="submit" class="btn-success">楽</button>
                @endif
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        <form action="trend/debug" method="post">
          <button type="submit" class="btn-success">debug</button>
        </form>
      </div>
    </div>
    @endsection
