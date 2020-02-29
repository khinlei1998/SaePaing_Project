<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignToHotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_to_hots', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cbp_id');
            $table->foreign('cbp_id')->references('cbp_id')->on('cbp_lists');
            $table->integer('cbp_subtask_id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->string('hot_id');
            $table->foreign('hot_id')->references('emp_id')->on('employees');
            $table->string('status');
            $table->string('deadline');
            $table->string('hot_report')->nullable();
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
        Schema::dropIfExists('assign_to_hots');
    }
}
