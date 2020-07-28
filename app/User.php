<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//トレンド中間テーブル



    //UserクラスとTrendクラスで中間テーブルとつなげる
    public function user_trends()
    {
        //多対多
        return $this->belongsToMany(trend::class, 'user_trends','user_id','trend_id')->withTimestamps();
    }

        // すでにトレンドに投票しているか？
    public function user_trend($trend_Id){

        $exist = $this->is_vote_trends($trend_Id);

        if($exist){
          return false;
        }else{
          $this->user_trends()->attach($trend_Id);
          return true;
        }
    }
    // トレンド投票をやり直し
    public function unuser_trend($trend_Id)
    {
      $exist = $this->is_vote_trends($trend_Id);

      if($exist){
        $this->user_trends()->attach($trend_Id);
        return true;
      }else{
        return false;
      }
    }

    //ログインユーザーが、すでに該当トレンドに投票済みか？
  public function is_vote_trends($trend_Id)
  {
    return $this->user_trends()->where('trend_id',$trend_Id)->exists();
  }

}
