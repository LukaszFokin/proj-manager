<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTasksStatusIdName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_tasks_status_id_foreign');
            $table->renameColumn('tasks_status_id', 'task_status_id');
            $table->foreign('task_status_id')->references('id')->on('tasks_status')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_task_status_id_foreign');
            $table->renameColumn('task_status_id', 'tasks_status_id');
            $table->foreign('tasks_status_id')->references('id')->on('tasks_status');
        });
    }
}
