<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_TrendController extends Controller
{
    //
    public function store(Request $request, $id)
    {
            \Auth::user()->user_trends($id);
            return back();
    }

    public function destroy($id)
    {
            \Auth::user()->user_trends($id);
            return back();
    }
  }
