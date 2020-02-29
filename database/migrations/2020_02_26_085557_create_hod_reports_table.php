<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHodReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hod_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hod_person');
            $table->foreign('hod_person')->references('emp_id')->on('employees');
            $table->string('status');
            $table->string('feedback');
            $table->string('report_desc')->nullable();
            $table->string('report_attached_file')->nullable();
            $table->string('percentage')->nullable();
            $table->unsignedInteger('projConfig_id');
            $table->foreign('projConfig_id')->references('id')->on('project_configs');
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
        Schema::dropIfExists('hod_reports');
    }
}
