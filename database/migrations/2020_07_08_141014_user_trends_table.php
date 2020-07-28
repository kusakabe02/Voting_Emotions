<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTrendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trends', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('trend_id');
          $table->integer('user_id');
          $table->integer('flag');
          $table->timestamps();
          $table->foreign('trend_id')->references('id')->on('trends');//外部キー制約
          $table->foreign('user_id')->references('id')->on('ve_users');//外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_trends');
    }
}
