<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLavelJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lavel_jobs', function (Blueprint $table) {
            $table->increments('lj_id');
            $table->string('lj_no',100)->nullable();
            $table->string('lj_name',255)->nullable();
            $table->string('lj_userCreate',255)->nullable();
            $table->string('lj_userUpdate',255)->nullable();
            $table->string('lj_userDelete',255)->nullable();
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
        Schema::dropIfExists('lavel_jobs');
    }
}
