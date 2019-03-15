<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {

          $table->string( 'user_name' );
          $table->unsignedBigInteger('link_id');

          //restrictions

          $table->foreign('user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('link_id')->references('link_id')->on('links')->onUpdate('cascade')->onDelete('cascade');
          $table->primary(['link_id','user_name']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rewards');
    }
}
