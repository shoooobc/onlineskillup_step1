<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like', function (Blueprint $table) {
            $table->bigIncrements('like_id');
            $table->String('github_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('fav')->nullable()->default(0);

            $table->foreign('github_id')->references('github_id')->on('users');
            $table->foreign('post_id')->references('post_id')->on('post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like');
    }
}
