<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('community_name');
            $table->text('community_rules')->nullable();
            $table->text('community_description')->nullable();
            $table->integer('number_of_subscriptions');
            $table->date('creation_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('community');
    }
}
