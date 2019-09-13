<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashTagsTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hash_tags_tweets', function (Blueprint $table) {
            $table->string('tag', 50);
            $table->unsignedBigInteger('tweet_id');

            $table->foreign('tweet_id')->references('id')->on('tweets');
            $table->foreign('tag')->references('tag')->on('hash_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash_tags_tweets');
    }
}
