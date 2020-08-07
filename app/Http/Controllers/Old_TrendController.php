<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Old_Trend;
use App\Trend;


class Old_TrendController extends Controller
{
    // 現在投票受付中以外のものを取得、ページングで1回ごと（50件表示）
    public function index(){
      $old_trend=Trend::orderBy('id','desc')
              ->offset(50)
              ->paginate(50);


      return view('oldtrend/index',compact('old_trend'));
    }
}
