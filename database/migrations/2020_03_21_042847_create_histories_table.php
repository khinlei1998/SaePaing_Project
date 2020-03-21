<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->string('receiver_id');
            $table->foreign('receiver_id')->references('emp_id')->on('employees');
            $table->string('description');
            $table->string('link_name');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->unsignedInteger('cbp_id');
            $table->foreign('cbp_id')->references('cbp_id')->on('cbp_lists');
            $table->tinyInteger('read_this');
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
        Schema::dropIfExists('histories');
    }
}
