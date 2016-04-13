<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->tinyInteger('status');

            $table->foreign('parent_id')->references('id')->on('phases');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phases');
    }
}
