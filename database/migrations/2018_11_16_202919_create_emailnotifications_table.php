<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailnotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailnotifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender');
            $table->integer('sendto');
            $table->string('sendto_email');
            $table->string('url');
            $table->string('body');
            $table->string('module');
            $table->string('notification_type');
            $table->integer('creator_id');
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
        Schema::dropIfExists('emailnotifications');
    }
}
