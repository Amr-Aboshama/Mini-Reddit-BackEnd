<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followings', function (Blueprint $table) {

          $table->string('follower_user_name');
          $table->string('followed_user_name');

          //restrictions

          $table->foreign('follower_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('followed_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->primary(['follower_user_name' ,'followed_user_name' ]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followings');
    }
}
