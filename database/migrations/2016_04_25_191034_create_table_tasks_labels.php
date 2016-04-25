<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTasksLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_label_id')->unsigned()->nullable();
            $table->integer('task_id')->nullable();

            $table->foreign('project_label_id')->references('id')->on('projects');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
