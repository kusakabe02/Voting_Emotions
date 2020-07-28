<?php

use Illuminate\Database\Seeder;

class TrendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // テーブルのクリア
DB::table('trends')->truncate();

// 初期データ用意（列名をキーとする連想配列）
$trends = [
          ['name' => '緊急地震速報',
           'url' => 'https://twitter.com/search?q=%E7%B7%8A%E6%80%A5%E5%9C%B0%E9%9C%87%E9%80%9F%E5%A0%B1&src=trend_click',
           'sum_votes_happy' => 0,
           'sum_votes_angry' => 180,
           'sum_votes_blue' => 360,
           'sum_votes_fun' => 20,
         ],
         ['name' => '地震大丈夫',
          'url' => 'https://twitter.com/search?q=%E5%9C%B0%E9%9C%87%E5%A4%A7%E4%B8%88%E5%A4%AB&src=trend_click',
          'sum_votes_happy' => 180,
          'sum_votes_angry' => 20,
          'sum_votes_blue' => 50,
          'sum_votes_fun' => 100,
        ],
        ['name' => 'かに座1位',
         'url' => 'https://twitter.com/search?q=%E3%81%8B%E3%81%AB%E5%BA%A71%E4%BD%8D&src=trend_click',
         'sum_votes_happy' => 360,
         'sum_votes_angry' => 20,
         'sum_votes_blue' => 30,
         'sum_votes_fun' => 100,
       ],
         ];

// 登録
    foreach($trends as $trend) {
      \App\trend::create($trend);
    }
  }
}
