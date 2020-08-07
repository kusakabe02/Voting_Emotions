<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Trend;
use App\User_trend;

class TrendController extends Controller
{
    //投票可能トレンド全件表示
    public function index()
      {
        //DBからトレンドを取得し、サブクエリ化(toSql)
        $trends = Trend::
        orderBy('id','desc')
        ->limit(50)
        ->toSql();

        $trends = DB::table(DB::raw('('.$trends.')AS Trends1'))
        ->orderBy('id','asc')->get();
        //表示するトレンドは最新50件

        return view('trend/index',compact('trends'));
      }

    //トレンド登録？？

    //happyへ投票
    public function happy_voting(Request $request,$id)
    {
      //ユーザトレンドInsertする準備
      $user_id = Auth::id();
      $user_trend = new User_trend();
      //投票＋１
      Trend::where('id',$id)
      ->increment('sum_votes_happy');
      //1度投票したトレンドには投票させないようにフラグを立てる
      $user_trend->create([
        'trend_id'=>$id,
        'user_id'=>$user_id,
        'flag'=>1
      ]);
      return redirect("/trend");
    }

    //angryへ投票
    public function angry_voting(Request $request,$id)
    {
      //ユーザトレンドInsertする準備
      $user_id = Auth::id();
      $user_trend = new User_trend();
      //投票＋１
      Trend::where('id',$id)
      ->increment('sum_votes_angry');
      //1度投票したトレンドには投票させないようにフラグを立てる
      $user_trend->create([
        'trend_id'=>$id,
        'user_id'=>$user_id,
        'flag'=>2
      ]);
      return redirect("/trend");
    }

    //blueへ投票
    public function blue_voting(Request $request,$id)
    {
      //ユーザトレンドInsertする準備
      $user_id = Auth::id();
      $user_trend = new User_trend();
      //投票＋１
      Trend::where('id',$id)
      ->increment('sum_votes_blue');
      //1度投票したトレンドには投票させないようにフラグを立てる
      $user_trend->create([
        'trend_id'=>$id,
        'user_id'=>$user_id,
        'flag'=>3
      ]);
      return redirect("/trend");
    }

    //funへ投票
    public function fun_voting(Request $request,$id)
    {
      //ユーザトレンドInsertする準備
      $user_id = Auth::id();
      $user_trend = new User_trend();
      //投票＋１
      Trend::where('id',$id)
      ->increment('sum_votes_fun');
      //1度投票したトレンドには投票させないようにフラグを立てる
      $user_trend->create([
        'trend_id'=>$id,
        'user_id'=>$user_id,
        'flag'=>4
      ]);
      return redirect("/trend");
    }


  }
