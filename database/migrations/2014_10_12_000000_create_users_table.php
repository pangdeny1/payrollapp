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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('employee_id');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->enum('gender', ["male", "female"]);
            $table->date('birthday')->nullable();
            $table->string('password');
            $table->string('country')->nullable();
            $table->string('manager')->default("no");;
            $table->rememberToken();
            $table->unsignedInteger('creator_id')->nullable();
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
