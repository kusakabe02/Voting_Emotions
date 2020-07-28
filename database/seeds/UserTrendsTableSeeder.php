<?php

use Illuminate\Database\Seeder;

class UserTrendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // テーブルのクリア
DB::table('user_trends')->truncate();

// 初期データ用意（列名をキーとする連想配列）
$user_trends = [
            ['trend_id' => 1,
             'user_id' => 1,
             'flag' => 0,
           ],
           ['trend_id' => 2,
            'user_id' => 1,
            'flag' => 1,
          ],
          ['trend_id' => 2,
           'user_id' => 2,
           'flag' => 0,
         ],
        ];

         foreach($user_trends as $user_trend) {
           \App\user_trend::create($user_trend);
         }

    }

}
