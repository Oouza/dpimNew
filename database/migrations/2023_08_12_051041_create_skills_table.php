<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('s_id');
            $table->string('s_no',255)->nullable();
            $table->string('s_name',255)->nullable();
            $table->text('s_detail')->nullable();
            $table->integer('FKs_capacity')->nullable();
            $table->integer('FKs_Create')->nullable();
            $table->string('s_userCreate',255)->nullable();
            $table->string('s_userUpdate',255)->nullable();
            $table->string('s_userDelete',255)->nullable();
            $table->integer('FKcapacityAdmin')->nullable();
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
        Schema::dropIfExists('skills');
    }
}
