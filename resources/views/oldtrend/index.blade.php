@extends('layouts.app')
  @section('content')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">日別トレンド一覧</h3>
      </div>
    </div>
    {{-- 日付指定 --}}
    日付を指定し表示：
    {{ Form::open(['action' => 'Old_TrendController@index','method' => 'get']) }}
      <input type="date" name="old_trend_post" id="old_trend_post" required>
    {{ Form::submit('表示') }}
    {{ Form::close() }}
    {{-- 対象がなかった場合、見つからない旨の文言 --}}
    {{-- @if(count($old_trend)==0) --}}
    @if(!isset($old_trend[0]))
    <h2>選択した日付にデータが存在しません。申し訳ございませんが、ほかの日付を選択してください。</h2>
    @else

    {{-- 取得日時 --}}
    <br>
    <h3>  トレンド取得日：
        {{ substr($created_dt->created_at,0,10) }}
    </h3>

    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        <table class="table table-striped table-hover">
          <tr>
            <th class="text-center">トレンド取得時間</th>
            <th class="text-center">トレンド名</th>
            <th class="text-center">喜</th>
            <th class="text-center">怒</th>
            <th class="text-center">哀</th>
            <th class="text-center">楽</th>
          </tr>

          @foreach($old_trend as $trend)
          <tr>

            <td>
              {{-- 取得時間 --}}
              <div class="text-center">
                  {{ substr($trend->created_at,10,9) }}
              </div>

            </td>

            <td>
              {{-- Twitteへのリンク、トレンド名 --}}
              <a href="{{ $trend->url }}">{{ $trend->name }}</a>
            </td>

            {{-- 喜怒哀楽投票数 --}}
            <td>
              {{-- 喜投票数 --}}
                  <div class="text-center">
                    {{ $trend->sum_votes_happy }}
                  </div>
            </td>
            <td>
              {{-- 怒投票数 --}}
              <div class="text-center">
                {{$trend->sum_votes_angry}}
              </div>
            </td>
            <td>
              {{-- 哀投票数 --}}
              <div class="text-center">
                {{$trend->sum_votes_blue}}
              </div>
            </td>
            <td>
              {{-- 楽投票数 --}}
              <div class="text-center">
                {{$trend->sum_votes_fun}}
              </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
      {{ $old_trend->appends(request()->input())->links() }}
    @endif
</div>
    @endsection
