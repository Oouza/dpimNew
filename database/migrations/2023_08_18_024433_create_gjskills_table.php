<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGjskillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gjskills', function (Blueprint $table) {
            $table->increments('gjs_id');
            $table->integer('FKgjs_skills')->nullable();
            $table->string('gjs_nameskills',255)->nullable();
            $table->integer('FKgjs_gjcapacity')->nullable();
            $table->integer('FKgjs_groupjob')->nullable();
            $table->integer('FKgjs_userCreate')->nullable();
            $table->string('gjs_userCreate',255)->nullable();
            $table->string('gjs_userUpdate',255)->nullable();
            $table->string('gjs_userDelete',255)->nullable();
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
        Schema::dropIfExists('gjskills');
    }
}
