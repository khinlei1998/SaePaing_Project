<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTaskAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_task_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cbp_id');
            $table->foreign('cbp_id')->references('cbp_id')->on('cbp_lists');
            $table->string('cbp_subtask');
            $table->integer('status');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->string('assign_person');
            $table->foreign('assign_person')->references('emp_id')->on('employees');
           
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
        Schema::dropIfExists('project_task_assigns');
    }
}
