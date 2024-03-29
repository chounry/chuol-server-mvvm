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
        Schema::create("users", function(Blueprint $table){
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('phone');
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('email')->unique();
            $table->string('img_loc')->default('default_user.png');
            $table->unsignedInteger('user_type_id')->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users");
    }
}
