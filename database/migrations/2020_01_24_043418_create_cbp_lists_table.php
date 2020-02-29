<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbpListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbp_lists', function (Blueprint $table) {
            $table->increments('cbp_id');
            $table->Text('cbp_name');
            $table->unsignedInteger('dept_id')->nullable();
            $table->foreign('dept_id')->references('dept_id')->on('departments');
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
        Schema::dropIfExists('cbp_lists');
    }
}
