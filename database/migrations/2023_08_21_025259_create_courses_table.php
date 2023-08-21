<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('cou_id');
            $table->string('cou_no',255)->nullable();
            $table->string('cou_name',255)->nullable();
            $table->string('cou_organizer',255)->nullable();
            $table->date('cou_startTime')->nullable();
            $table->date('cou_endTime')->nullable();
            $table->integer('FKcou_typeCourse')->nullable();
            $table->string('cou_nametypeCourse',255)->nullable();
            $table->integer('cou_period')->nullable();
            $table->string('cou_frequency',255)->nullable();
            $table->text('cou_detail')->nullable();
            $table->text('cou_note')->nullable();
            $table->integer('FKcou_userCreate')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
