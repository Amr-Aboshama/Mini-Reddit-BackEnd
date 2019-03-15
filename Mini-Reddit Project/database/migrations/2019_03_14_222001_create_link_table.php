<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
                Schema::create('link', function (Blueprint $table) {
                $table->integer('id')->primary();
                $table->date('link_date');
                $table->string('content');
                $table->integer('number_of_upvotes');
                $table->integer('number_of_downvotes');
                $table->biginteger('parent_id')->nullable(); //nullable because the post parent is null
                //$table->foreign('parent_id')->refernces('id')->on('link')->ondelete('cascade')->onupdate('cascade');
                });
               
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link');
    }
}
