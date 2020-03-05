<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('emp_id');
            $table->primary('emp_id');
            $table->string('emp_name',60);
            $table->longtext('emp_jobdesp');
            $table->string('emp_position',60);
            $table->text('emp_profile')->nullable();
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('group_id')->on('groups');
            $table->unsignedInteger('subdept_id')->nullable();
            $table->foreign('subdept_id')->references('subdept_id')->on('sub_departments');
            $table->unsignedInteger('dept_id')->nullable();
            $table->foreign('dept_id')->references('dept_id')->on('departments');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id')->references('team_id')->on('teams');
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
