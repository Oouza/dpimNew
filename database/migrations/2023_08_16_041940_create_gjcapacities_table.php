<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGjcapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gjcapacities', function (Blueprint $table) {
            $table->increments('gjc_id');
            $table->integer('FKgjc_capacity')->nullable();
            $table->string('gjc_namecapacity',255)->nullable();
            $table->string('gjc_important',255)->nullable();
            $table->integer('FKgjc_groupjob')->nullable();
            $table->string('gjc_namegroupjob',255)->nullable();
            $table->integer('FKgjc_userCreate')->nullable();
            $table->string('gjc_userCreate',255)->nullable();
            $table->string('gjc_userUpdate',255)->nullable();
            $table->string('gjc_userDelete',255)->nullable();
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
        Schema::dropIfExists('gjcapacities');
    }
}
