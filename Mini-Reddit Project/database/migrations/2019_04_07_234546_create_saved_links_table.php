<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_links', function (Blueprint $table) {
            $table->string('username');
            $table->unsignedBigInteger('link_id');

            //restrictions

            $table->foreign('username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('link_id')->references('link_id')->on('links')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['link_id','username']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_links');
    }
}
