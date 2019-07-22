<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('work_id')->unsigned();

            // 応募状況を表す
            $table->integer('status')->default(0);
            $table->timestamps();

            // ユーザーとの外部キー
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // 仕事との外部キー
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');

            // 仕事へのエントリーはユーザーが2回出来ない様にDB上で制限を設けている。
            $table->unique(['user_id', 'work_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
