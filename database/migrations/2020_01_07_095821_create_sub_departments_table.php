<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_departments', function (Blueprint $table) {
            $table->increments('subdept_id');
            $table->string('subdept_name',60);
            $table->unsignedInteger('dept_id');
            $table->foreign('dept_id')->references('dept_id')->on('departments');
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
        Schema::dropIfExists('sub_departments');
    }
}
