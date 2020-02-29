<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hot_person');
            $table->foreign('hot_person')->references('emp_id')->on('employees');
            $table->string('status');
            $table->string('hot_feedback');
            $table->string('hot_report_desc')->nullable();
            $table->string('hot_report_attached_file')->nullable();
            $table->unsignedInteger('assigntb_id');
            $table->foreign('assigntb_id')->references('id')->on('assign_to_hots');
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
        Schema::dropIfExists('hot_reports');
    }
}
