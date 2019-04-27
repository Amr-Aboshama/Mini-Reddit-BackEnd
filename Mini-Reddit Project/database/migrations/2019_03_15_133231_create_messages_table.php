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
            $table->timestamp('message_date');
            $table->string('sender_username');
            $table->string('receiver_username');

            // restrictions

            $table->foreign('sender_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('receiver_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
