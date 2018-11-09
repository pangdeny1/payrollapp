<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavebalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leavebalances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('leavetype_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('days',12,2);
            $table->integer("creator_id");
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
        Schema::dropIfExists('leavebalances');
    }
}
