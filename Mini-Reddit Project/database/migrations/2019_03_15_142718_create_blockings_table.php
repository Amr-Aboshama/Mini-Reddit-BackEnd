<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockings', function (Blueprint $table) {

          $table->string('blocker_user_name');
          $table->string('blocked_user_name');

          //restrictions

          $table->foreign('blocker_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('blocked_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->primary(['blocker_user_name' ,'blocked_user_name' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blockings');
    }
}
