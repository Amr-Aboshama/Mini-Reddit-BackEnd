<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            //$table->bigIncrements('id');
            //$table->timestamps();

            $table->string('user_name');
            $table->string('display_name')->nullable();
            $table->dateTime('cake_date');
            $table->string('email');
            $table->bigInteger('karma');
            $table->string('password');
            $table->text('about')->nullable();
            $table->string('photo_url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            //restrictions

            $table->unique('email');
            $table->primary('user_name');

            //????

            $table->rememberToken();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
