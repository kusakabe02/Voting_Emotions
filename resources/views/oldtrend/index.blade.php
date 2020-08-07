@extends('layouts.app')
  @section('content')
  <!--modalモーダルウィンドウ-->
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">投票終了トレンド一覧</h3>
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
            <th class="text-center">トレンド取得日時</th>
          </tr>
          @foreach($old_trend as $trend)
          <tr>

            <td>
              {{-- ランキングの添え字 --}}
              {{ $loop->iteration }}
            </td>

            <td>
              {{-- Twitteへのリンク、トレンド名 --}}
              <a href="{{ $trend->url }}">{{ $trend->name }}</a>
            </td>

            {{-- 喜怒哀楽投票数 --}}
            <td>
              {{-- 喜投票数 --}}
                  {{ $trend->sum_votes_happy }}

            </td>
            <td>
              {{-- 怒投票数 --}}
                  {{$trend->sum_votes_angry}}
            </td>
            <td>
              {{-- 哀投票数 --}}
                  {{$trend->sum_votes_blue}}
            </td>
            <td>
              {{-- 楽投票数 --}}
                  {{$trend->sum_votes_fun}}
            </td>

            <td>
              {{-- 楽投票数 --}}
                  {{$trend->created_at}}
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    {{ $old_trend->links() }}
</div>
    @endsection
