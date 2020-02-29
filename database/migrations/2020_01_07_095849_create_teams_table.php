<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('team_id');
            $table->string('team_name',60);
            $table->unsignedInteger('subdept_id')->nullable();
            $table->foreign('subdept_id')->references('subdept_id')->on('sub_departments');
            $table->unsignedInteger('dept_id')->nullable();
            $table->foreign('dept_id')->references('dept_id')->on('departments');
            $table->unsignedInteger('group_id')->nullable();
            $table->foreign('group_id')->references('group_id')->on('groups');
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
        Schema::dropIfExists('teams');
    }
}
