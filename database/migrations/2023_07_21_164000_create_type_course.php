<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_course', function (Blueprint $table) {
            $table->increments('tc_id');
            $table->string('tc_no',100)->nullable();
            $table->string('tc_name',255)->nullable();
            $table->string('tc_userCreate',255)->nullable();
            $table->string('tc_userUpdate',255)->nullable();
            $table->string('tc_userDelete',255)->nullable();
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
        Schema::dropIfExists('type_course');
    }
}
