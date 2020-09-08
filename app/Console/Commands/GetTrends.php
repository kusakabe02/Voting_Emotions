<?php

namespace App\Console\Commands;

//composer読み込み
require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Console\Command;
use App\Console\Commands\Storage;
use App\Trend;

class GetTrends extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trends:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'GetTrendCommand';

    //テーブル格納のためのDB接続情報
  	protected $request_url = 'https://api.twitter.com/1.1/trends/place.json';		// エンドポイント
  	protected $request_method = 'GET';



    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public static function handle()
    {
      // 設定
       $config = config('twitter');
        //トレンドを取得し、テーブルに格納する
        $connection = new TwitterOAuth($config['api_key'], $config['secret_key'], $config['access_token'], $config['access_token_secret']);
        $request = $connection->OAuthRequest("https://api.twitter.com/1.1/trends/place.json","GET",array("id"=>"23424856"));
        $obj =  json_decode($request,true);

        //現在のAPIの仕様だと、この値はゼロ
        $trend_get_suffix=0;

        foreach($obj[$trend_get_suffix]['trends'] as $key => $trend_name){

           $save_trend = new Trend();

           $save_trend->name = $trend_name['name'];
           $save_trend->url =$trend_name['url'];
           $save_trend->sum_votes_happy=0;
           $save_trend->sum_votes_angry=0;
           $save_trend->sum_votes_blue=0;
           $save_trend->sum_votes_fun=0;
           $save_trend->save();

        }





    }
}
