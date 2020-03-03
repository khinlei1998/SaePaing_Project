<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cbp_id');
            $table->foreign('cbp_id')->references('cbp_id')->on('cbp_lists');
            $table->string('cbp_subtask');
            $table->enum('status', ['Assigned', 'Started', 'In Progress','Pause','Completed']);
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->string('assign_person');
            $table->foreign('assign_person')->references('emp_id')->on('employees');
            $table->string('d_line');
            $table->string('percent')->nullable();
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
        Schema::dropIfExists('project_configs');
    }
}
