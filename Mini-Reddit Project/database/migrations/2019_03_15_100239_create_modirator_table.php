<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModiratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modirator', function (Blueprint $table) {
            $table->string('modirator_username')->primary();
            $table->foreign('modirator_username')->references('username')->on('users')->ondelete('cascade')->onupdate('cascade');
            $table->integer('community_id')->primary();
            $table->foreign('community_id')->references('id')->on('community')->ondelete('cascade')->onupdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modirator');
    }
}
