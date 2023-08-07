<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_minerals', function (Blueprint $table) {
            $table->increments('tm_id');
            $table->string('tm_no',100)->nullable();
            $table->string('tm_name',255)->nullable();
            $table->string('tm_userCreate',255)->nullable();
            $table->string('tm_userUpdate',255)->nullable();
            $table->string('tm_userDelete',255)->nullable();
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
        Schema::dropIfExists('type_minerals');
    }
}
