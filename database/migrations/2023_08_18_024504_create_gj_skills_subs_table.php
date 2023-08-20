<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGjSkillsSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gj_skills_subs', function (Blueprint $table) {
            $table->increments('gjss_id');
            $table->integer('FKgjss_skillsSub')->nullable();
            $table->string('gjss_nameskillsSub',255)->nullable();
            $table->integer('FKgjss_gjskills')->nullable();
            $table->integer('FKgjss_gjcapacity')->nullable();
            $table->integer('FKgjss_groupjob')->nullable();
            $table->integer('FKgjss_userCreate')->nullable();
            $table->string('gjss_userCreate',255)->nullable();
            $table->string('gjss_userUpdate',255)->nullable();
            $table->string('gjss_userDelete',255)->nullable();
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
        Schema::dropIfExists('gj_skills_subs');
    }
}
