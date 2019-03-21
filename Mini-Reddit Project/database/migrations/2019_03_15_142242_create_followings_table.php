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

          $table->string('follower_username');
          $table->string('followed_username');

          //restrictions

         $table->foreign('follower_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
         $table->foreign('followed_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
         $table->primary(['follower_username' ,'followed_username' ]);

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
