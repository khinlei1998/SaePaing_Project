<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_information', function (Blueprint $table) {
            $table->increments('share_id');
            $table->string('share_description');
            $table->string('share_to');
            $table->foreign('share_to')->references('emp_id')->on('employees');
            $table->string('share_by');
            $table->foreign('share_by')->references('emp_id')->on('employees');
            $table->unsignedInteger('mission_id')->nullable();
            $table->foreign('mission_id')->references('mission_id')->on('missions');
            $table->unsignedInteger('task_id')->nullable();
            $table->foreign('task_id')->references('task_id')->on('tasks');
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
        Schema::dropIfExists('share_information');
    }
}
