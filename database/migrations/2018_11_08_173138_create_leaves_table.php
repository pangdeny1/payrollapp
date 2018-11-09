<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->date("start_date");
            $table->date("end_date");
            $table->integer("working_days")->nullabe();
            $table->integer("holiday_days")->nullabe();
            $table->integer("total_days")->nullabe();
            $table->string("reason_for_leave");
            $table->integer("user_id");
            $table->integer("manager_id");
            $table->string("status");
            $table->integer('employee_id');
            $table->integer('leavetype_id');
            $table->integer("creator_id");
            $table->string("reason_for_rejection");
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
        Schema::dropIfExists('leaves');
    }
}
