<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills_subs', function (Blueprint $table) {
            $table->increments('ss_id');
            $table->string('ss_no',255)->nullable();
            $table->string('ss_name',255)->nullable();
            $table->text('ss_detail')->nullable();
            $table->text('ss_standardOne')->nullable();
            $table->text('ss_standardTwo')->nullable();
            $table->text('ss_standardThree')->nullable();
            $table->integer('FKss_skills')->nullable();
            $table->integer('FKss_capacity')->nullable();
            $table->integer('FKss_Create')->nullable();
            $table->string('ss_userCreate',255)->nullable();
            $table->string('ss_userUpdate',255)->nullable();
            $table->string('ss_userDelete',255)->nullable();
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
        Schema::dropIfExists('skills_subs');
    }
}
