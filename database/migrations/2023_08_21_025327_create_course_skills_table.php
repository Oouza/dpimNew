<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_skills', function (Blueprint $table) {
            $table->increments('cs_id');
            $table->integer('FKcs_skills')->nullable();
            $table->string('cs_nameskills',255)->nullable();
            $table->integer('FKcs_course')->nullable();
            $table->string('cs_namecourse',255)->nullable();
            $table->integer('FKcs_userCreate')->nullable();
            $table->string('cou_userCreate',255)->nullable();
            $table->string('cou_userUpdate',255)->nullable();
            $table->string('cou_userDelete',255)->nullable();
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
        Schema::dropIfExists('course_skills');
    }
}
