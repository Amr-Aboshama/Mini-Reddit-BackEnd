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

          $table->string('blocker_username');
          $table->string('blocked_username');

          //restrictions

          $table->foreign('blocker_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('blocked_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->primary(['blocker_username' ,'blocked_username' ]);
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
