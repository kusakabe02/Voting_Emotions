<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTrendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_trends', function (Blueprint $table) {
            //UserTableをそのまま使うため、自前のテーブルでの制約を削除
            $table->dropForeign('user_trends_user_id_foreign');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//外部キー制約
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
            //$table->foreign('user_id')->references('id')->on('ve_users')->change();//外部キー制約

        });
    }
}
