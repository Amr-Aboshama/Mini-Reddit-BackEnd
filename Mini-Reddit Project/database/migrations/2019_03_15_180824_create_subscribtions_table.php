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
            $table->string('username');
            $table->unsignedBigInteger('community_id');
            $table->bigIncrements('subscribtion_id'); //primary key

            //restrictions

            $table->foreign('username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('community_id')->references('community_id')->on('communities')->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['username','community_id']);
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
