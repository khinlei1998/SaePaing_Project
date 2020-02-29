<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('task_unique_id')->nullable();
            $table->string('project_code')->nullable();
            $table->string('task_title');
            $table->mediumtext('description');
            $table->string('assignee_person');
            $table->foreign('assignee_person')->references('emp_id')->on('employees');
            $table->string('assignor_person');
            $table->foreign('assignor_person')->references('emp_id')->on('employees');
            $table->string('assignee_attach_file')->nullable();
            $table->string('assignor_attach_file')->nullable();
            $table->integer('status')->default('0');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('feedback')->nullable();
            $table->unsignedInteger('dept_id');
            $table->foreign('dept_id')->references('dept_id')->on('departments');
            $table->unsignedInteger('subdept_id')->nullable();
            $table->foreign('subdept_id')->references('subdept_id')->on('sub_departments');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->foreign('project_code')->references('project_code')->on('projects');
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
        Schema::dropIfExists('tasks');
    }
}
