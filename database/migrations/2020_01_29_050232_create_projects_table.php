<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('project_code')->unique();
            $table->mediumtext('project_title');
            $table->mediumtext('project_description');
            $table->string('project_region');
           
            $table->string('project_startDate');
            $table->string('project_endDate');
//            $table->unsignedInteger('cbp_id');
//            $table->foreign('cbp_id')->references('cbp_id')->on('cbp_lists');
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
        Schema::dropIfExists('projects');
    }
}
