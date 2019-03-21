<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModerateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderate_communities', function (Blueprint $table) {
            $table->string('username');
            $table->unsignedBigInteger('community_id');

            //restrictions

            $table->foreign('username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('community_id')->references('community_id')->on('communities')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['username','community_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moderate_communities');
    }
}
