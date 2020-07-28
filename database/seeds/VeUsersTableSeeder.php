<?php

use Illuminate\Database\Seeder;

class VeUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
      // テーブルのクリア
DB::table('ve_users')->truncate();

// 初期データ用意（列名をキーとする連想配列）
$ve_users = [
          ['name' => 'Test0001',
           'password' => 'Test0001'],
           ['name' => 'Test0002',
            'password' => 'Test0002'],
            ['name' => 'Test0003',
             'password' => 'Test0003'],
         ];

// 登録
    foreach($ve_users as $ve_user) {
      \App\ve_user::create($ve_user);
    }
  }
}
