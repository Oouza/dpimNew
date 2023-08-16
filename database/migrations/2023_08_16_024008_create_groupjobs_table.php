<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupjobs', function (Blueprint $table) {
            $table->increments('gj_id');
            $table->string('gj_no',255)->nullable();
            $table->string('gj_name',255)->nullable();
            $table->text('gj_detail')->nullable();
            $table->integer('FKgj_typeJob')->nullable();
            $table->string('gj_nametypeJob',255)->nullable();
            $table->integer('FKgj_lavel')->nullable();
            $table->string('gj_namelavel',255)->nullable();
            $table->integer('FKgj_userCreate')->nullable();
            $table->string('gj_userCreate',255)->nullable();
            $table->string('gj_userUpdate',255)->nullable();
            $table->string('gj_userDelete',255)->nullable();
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
        Schema::dropIfExists('groupjobs');
    }
}
