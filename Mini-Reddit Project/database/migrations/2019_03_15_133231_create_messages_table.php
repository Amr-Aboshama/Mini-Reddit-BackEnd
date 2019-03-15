<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

          $table->bigIncrements('message_id');   //primary key
          $table->string('content');
          $table->dateTime('message_date');
          $table->string('sender_user_name');
          $table->string('receiver_user_name');

          // restrictions

          $table->foreign('sender_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('receiver_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
