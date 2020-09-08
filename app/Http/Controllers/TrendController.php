<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\trend;
use App\user_trend;

class TrendController extends Controller
{
    //投票可能トレンド全件表示
    public function index()
      {
        //DBからトレンドを取得し、サブクエリ化(toSql)
        //キャッシュ

        $trends = trend::
        orderBy('id','desc')
        ->sharedLock()
        ->limit(50)
        ->toSql();

        $trends = DB::table(DB::raw('('.$trends.')AS Trends1'))
        ->orderBy('id','asc')->get();
        //表示するトレンドは最新50件

        return view('trend/index',compact('trends'));
      }

//ラジオボタンで投票
    public function Radio_voting(Request $request){
      $debugs = $request->request;
      $happycnt=0;
      $angrycnt=0;
      $bluecnt=0;
      $funcnt=0;
      $in_flag=0;

      $user_id = Auth::id();
      $user_trend = new User_trend();

//ラジオ選択結果を取り込み
      foreach ($debugs as $key => $value) {
//配列の文字列を分割
        //$votes=explode(",",$value);
        $votes=array_pad(explode(",",$value),2,null);

//文字列によって処理を分ける

         if("happy"==$votes[0]){
           trend::where('id',$votes[1])
           ->sharedLock()
           ->increment('sum_votes_happy');

         //1度投票したトレンドには投票させないように中間テーブル作成。フラグを立てる
           $user_trend->create([
             'trend_id'=>$votes[1],
             'user_id'=>$user_id,
             'flag'=>1
           ]);
         }

         if("angry"==$votes[0]){
           trend::where('id',$votes[1])
           ->sharedLock()
           ->increment('sum_votes_angry');
           $user_trend->create([
             'trend_id'=>$votes[1],
             'user_id'=>$user_id,
             'flag'=>2
           ]);

         }

         if("blue"==$votes[0]){
           trend::where('id',$votes[1])
           ->sharedLock()
           ->increment('sum_votes_blue');
           $user_trend->create([
             'trend_id'=>$votes[1],
             'user_id'=>$user_id,
             'flag'=>3
           ]);
         }

         if("fun"==$votes[0]){
           trend::where('id',$votes[1])
           ->sharedLock()
           ->increment('sum_votes_fun');
           $user_trend->create([
             'trend_id'=>$votes[1],
             'user_id'=>$user_id,
             'flag'=>4
           ]);
         }
      }

     return redirect("/trend");
   }

  }
