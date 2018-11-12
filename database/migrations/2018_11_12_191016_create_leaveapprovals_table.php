<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveapprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaveapprovals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id');
            
            $table->enum("action_type", [
                "pending",
                "approve",
                "reject",                
            ])->default("pending");

            $table->integer('leavetype_id');
            $table->integer('employee_id');
            $table->integer('action_by');
            $table->integer('creator_id');
            $table->string('comment');

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
        Schema::dropIfExists('leaveapprovals');
    }
}
