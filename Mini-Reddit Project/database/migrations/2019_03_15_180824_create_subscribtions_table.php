<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribtionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribtions', function (Blueprint $table) {

          $table->string('user_name');
          $table->unsignedBigInteger('community_id');

          //restrictions

          $table->foreign('user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('community_id')->references('community_id')->on('communities')->onUpdate('cascade')->onDelete('cascade');
          $table->primary(['user_name','community_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribtions');
    }
}
