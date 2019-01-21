<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
             $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->enum('gender', ["male", "female"]);
            $table->decimal('period_rate',12,2)->nullable();
            $table->string('pay_type');
            $table->integer('sstype_id');
            $table->decimal('hourly_rate',12,2)->nullable();
            $table->string('pay_period');
            $table->string('active');
            $table->string('deduct_tax')->nullable();
            $table->string('deduct_ss')->nullable();
            $table->string('deduct_health')->nullable();
            $table->string('deduct_hdmf')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('job_id')->nullable();
            $table->integer('health_id')->nullable();
            $table->integer('hdmf_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('bankbranch_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('ss_number')->nullable();
            $table->string('health_number')->nullable();
            $table->string('hdmf_number')->nullable();
            $table->string('marital')->nullable();
            $table->string('company_id')->nullable();

            $table->date('hire_date');
            $table->date('terminate_date')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('retired_date')->nullable();
            $table->date('probation_date')->nullable();

            $table->string('employement_status')->default('active')->nullable();
            $table->string('code')->nullable();
            $table->string('title_id')->nullable();
            $table->string('picture')->nullable();
            $table->string('about_employee')->nullable();

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
        Schema::dropIfExists('employees');
    }
}
