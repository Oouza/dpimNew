<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_job', function (Blueprint $table) {
            $table->increments('tj_id');
            $table->string('tj_no',100)->nullable();
            $table->string('tj_name',255)->nullable();
            $table->string('tj_userCreate',255)->nullable();
            $table->string('tj_userUpdate',255)->nullable();
            $table->string('tj_userDelete',255)->nullable();
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
        Schema::dropIfExists('type_job');
    }
}
