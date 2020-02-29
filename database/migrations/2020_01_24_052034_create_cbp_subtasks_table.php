<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbpSubtasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbp_subtasks', function (Blueprint $table) {
            $table->increments('id');
            $table->Text('cbp_subtask');
            $table->unsignedInteger('cbp_id')->nullable();
            $table->foreign('cbp_id')->references('cbp_id')->on('cbp_lists');
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
        Schema::dropIfExists('cbp_subtasks');
    }
}
