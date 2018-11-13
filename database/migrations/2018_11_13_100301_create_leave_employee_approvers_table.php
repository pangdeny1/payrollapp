<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveEmployeeApproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_employee_approvers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('approver_id');
            $table->integer('employee_id');
            $table->integer('leavetype_id');
            $table->integer('level_id');
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
        Schema::dropIfExists('leave_employee_approvers');
    }
}
