<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetDefaultValuesForeignPhases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phases', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->nullable()->default(null)->change();
            $table->integer('project_id')->unsigned()->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phases', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->nullable()->change();
            $table->integer('project_id')->unsigned()->nullable()->change();
        });
    }
}
