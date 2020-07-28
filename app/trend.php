<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class trend extends Model
{
    //中間テーブルとつなげる
    public function user_trends()
    {
        //多対多
        return $this->belongsToMany(Movie::class, 'user_trends','user_id','trend_id')->withTimestamps();
    }

        // すでにトレンドに投票しているか？
    public function user_trend(){

        $exist = $this->is_vote_trends($trend_id);

        if($exist){
          return false;
        }else{
          $this->user_trends()->attach($trend_id);
          return true;
        }
    }
    // トレンド投票をやり直し
    public function unuser_trend($trend_id)
    {
      $exist = $this->is_vote_trends($trend_id);

      if($exist){
        $this->user_trends()->attach($trend_id);
        return true;
      }else{
        return false;
      }
    }

    //ログインユーザーが、すでに該当トレンドに投票済みか？
  public function is_vote_trends($trend_id)
  {
    return $this->user_trends()->where('trend_id',$trend_id)->exists();
  }

}
