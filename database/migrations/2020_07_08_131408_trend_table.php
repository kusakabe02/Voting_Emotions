<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trends', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',255);
          $table->text('url');
          $table->integer('sum_votes_happy');
          $table->integer('sum_votes_angry');
          $table->integer('sum_votes_blue');
          $table->integer('sum_votes_fun');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trends');
    }
}
