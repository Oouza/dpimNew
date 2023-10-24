<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('tn_id');
            $table->integer('FKtn_userId')->nullable();
            $table->string('name_user',255)->nullable();
            $table->integer('FKtn_courseId')->nullable();
            $table->string('name_course',255)->nullable();
            $table->date('tn_dateTrain')->nullable();
            $table->date('tn_endCredit')->nullable();
            $table->string('tn_Credit',255)->nullable();
            $table->integer('FKtn_capacity')->nullable();
            $table->string('name_capacity',255)->nullable();
            $table->integer('FKtn_skills')->nullable();
            $table->string('name_skills',255)->nullable();
            $table->integer('FKtn_skillsSub')->nullable();
            $table->string('name_skillsSub',255)->nullable();
            $table->integer('tn_moneyTrain')->nullable();
            $table->integer('tn_moneyOther')->nullable();
            $table->integer('tn_status')->nullable();
            $table->text('tn_note')->nullable();
            $table->integer('FKtn_userCreate')->nullable();
            $table->string('tn_userCreate')->nullable();
            $table->string('tn_userUpdate')->nullable();
            $table->string('tn_userDelete')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
