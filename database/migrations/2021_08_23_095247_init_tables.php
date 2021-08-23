<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('time_log', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('freelancer_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('time_log', function(Blueprint $table) {
            $table->foreign('freelancer_id')->references('id')->on('freelancer');
            $table->foreign('project_id')->references('id')->on('project');
        });


        Schema::create('project_freelancer', function (Blueprint $table) {
            $table->integer('project_id');
            $table->integer('freelancer_id');
            $table->timestamps();

            $table->primary(['project_id', 'freelancer_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancer');
        Schema::dropIfExists('project');
        Schema::dropIfExists('time_log');
        Schema::dropIfExists('project_freelancer');
    }
}
