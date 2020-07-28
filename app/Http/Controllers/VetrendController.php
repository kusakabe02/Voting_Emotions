<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VeTrend;

class VetrendController extends Controller
{
  public function index()
    {
      //DBからトレンドを取得
      $trends = Trend::all();

      //viewに渡す
      return view('trend/index',compact('trends'));
    }


}
