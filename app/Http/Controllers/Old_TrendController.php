<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Requests;
use Request;
use App\Http\Input;
use App\Old_Trend;
use App\Trend;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ItemRequest;
use Carbon\Carbon;

class Old_TrendController extends Controller
{
    // 現在投票受付中以外のものを取得、ページングで1回ごと（50件表示）
    //ページングを廃止し、デフォルトでは前日の投票を表示する
    public function index(){

      //値を取得
      $serch_day = Request::input('old_trend_post');


      if(!empty($serch_day)){
      //if(!empty($request) ){
        //リクエストがあった場合（表示ボタンを押下した遷移）
        //$serch_day = $request->all();
        //$serch_day = $serch_day['old_trend_post'];

        //$serch_day = new Carbon();
        //$serch_day = Carbon::yesterday();

      }
      else{
        //リクエストがなかった場合（上のメニューとかから遷移）
        $serch_day = new Carbon();
        $serch_day = Carbon::yesterday();
      }

      $old_trend = DB::table('trends')
                      ->whereDate('created_at', '=',$serch_day)
                      ->orderBy('id','asc')
                      ->paginate(50);
                      //->get();
      //日付だけ取得
      $created_dt = DB::table('trends')
                        ->whereDate('created_at', '=',$serch_day)
                        ->orderBy('id','asc')
                        ->first();

                      /*
      $query = Trend::offset(1000)
      ->limit(1000);*/

      //$old_trend = $old_trend->paginate(50);

      return view ('oldtrend.index')
      ->with('old_trend',$old_trend)
      ->with('created_dt',$created_dt);

      //return view('oldtrend.index',compact('old_trend','created_dt'));
    }


/*    public function Old_Trend_day(Request $request)
    {

       $debugs = $request->all();
       $debugs = $debugs['old_trend_post'];
       //extract($debugs);

       //$old = $debugs['previous'][0];

       $old_trend = DB::table('trends')
                       ->whereDate('created_at', '=',$debugs)
                       ->paginate(50);
                       //->get();
        //日付だけ取得
       $created_dt = DB::table('trends')
                       ->whereDate('created_at', '=',$debugs)
                       ->orderBy('id','asc')
                       ->first();


/*      return view ('oldtrend.index')
      ->with('old_trend',$old_trend)
      ->with('name',$name)
      ->with('url',$url)
      ->with('sum_votes_happy',$sum_votes_happy)
      ->with('sum_votes_angry',$sum_votes_angry)
      ->with('sum_votes_blue',$sum_votes_blue)
      ->with('sum_votes_fun',$sum_votes_fun);

      return view ('oldtrend.index')
      ->with('old_trend',$old_trend)
      ->with('created_dt',$created_dt);

       //return view('oldtrend.index',compact('old_trend','created_dt'));

    }
*/

}
