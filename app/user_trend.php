<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_trend extends Model
{
    //
    protected $fillable = [
    'trend_id', 'user_id', 'flag',
];

}
