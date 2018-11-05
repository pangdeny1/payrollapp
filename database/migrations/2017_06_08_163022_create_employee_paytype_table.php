<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePaytypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
       Schema::create('paytypes', function (Blueprint $table) {

            $table->string('id');
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
            $table->softDeletes();

        });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('paytypes');
    }

}
