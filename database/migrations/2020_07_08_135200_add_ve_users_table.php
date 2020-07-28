<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ve_users', function (Blueprint $table) {
          $table->string('name',100)->unique()->change();//ユニークに
          $table->string('remember_token',100);//カラム追加
          $table->string('password',255)->change();//文字増やす
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ve_users', function (Blueprint $table) {
          $table->string('name',100);
          $table->dropColumn('remember_token');
          $table->string('password',50)->change();

        });
    }
}
