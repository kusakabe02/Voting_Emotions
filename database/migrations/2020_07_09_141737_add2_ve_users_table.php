<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2VeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ve_users', function (Blueprint $table) {
            //null許容させる
            $table->string('remember_token',100)->nullable()->change();
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
            //null許容しない
          $table->string('remember_token',100)->change();
        });
    }
}
