<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {


            $table->bigIncrements('link_id');
            $table->string('content')->nullable();
            $table->string('content_image')->nullable(); //url of the image
            $table->string('video_url')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('link_date');
            $table->unsignedTinyInteger('pinned')->default(0);
            $table->string('author_user_name');     //owner of the post....
            $table->unsignedBigInteger('community_id')->nullable();     //if the post in community...
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->bigInteger('upvotes')->default(0);
            $table->bigInteger('downvotes')->default(0);

            //restrictions

            $table->foreign('author_user_name')->references('user_name')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('parent_id')->references('link_id')->on('links')->onUpdate('cascade')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
