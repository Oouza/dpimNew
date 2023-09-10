<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacities', function (Blueprint $table) {
            $table->increments('cc_id');
            $table->string('cc_no',255)->nullable();
            $table->string('cc_name',255)->nullable();
            $table->text('cc_detail')->nullable();
            $table->integer('FKcc_Create')->nullable();
            $table->string('cc_userCreate',255)->nullable();
            $table->string('cc_userUpdate',255)->nullable();
            $table->string('cc_userDelete',255)->nullable();
            $table->integer('FKgroupAdmin')->nullable();
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
        Schema::dropIfExists('capacities');
    }
}
