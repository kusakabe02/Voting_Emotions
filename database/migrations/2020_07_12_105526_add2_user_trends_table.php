<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2UserTrendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_trends', function (Blueprint $table) {
          //$table->dropForeign('user_trends_user_id_foreign');
          $table->bigIncrements('user_id')->unsigned()->change();//参照元と型を合わせる必要がある？
          //$table->foreign('user_id')->references('id')->on('users');//外部キー制約 なんかうまくいかない
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_trends', function (Blueprint $table) {
          //元に戻す
          $table->integer('user_id')->unsigned()->change();
        });
    }
}
