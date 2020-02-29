<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->increments('mission_id');
            $table->string('job_type');
            $table->string('job_target');
            $table->longtext('job_obj');
            $table->dateTime('jobfinished_date');
            $table->longtext('doing_methods');
            $table->string('attach_files');
            $table->integer('status');
            $table->mediumtext('issue_resolve_ways');
            $table->mediumtext('remark');
            $table->string('emp_id');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
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
        Schema::dropIfExists('missions');
    }
}
