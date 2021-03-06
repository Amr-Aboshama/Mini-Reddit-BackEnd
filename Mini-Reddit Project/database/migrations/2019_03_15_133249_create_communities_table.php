<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->bigIncrements('community_id'); //primary key
            $table->string('name');
            $table->text('rules')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('creation_date');
            $table->string('community_logo')->nullable();
            $table->string('community_banner')->nullable();
            //restrictions
        });


        //this bcuz community is created after links and i'd like to put a foreign key in links refering to community

        Schema::table('links', function (Blueprint $table) {
            $table->foreign('community_id')->references('community_id')->on('communities')->onUpdate('cascade')->onDelete('cascade');
        });
    }





    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communities');
    }
}
