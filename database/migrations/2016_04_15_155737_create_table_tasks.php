<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name', 250);
            $table->text('description');
            $table->dateTime('date_created');
            $table->integer('tasks_status_id')->unsigned()->nullable();
            $table->foreign('tasks_status_id')->references('id')->on('tasks_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
