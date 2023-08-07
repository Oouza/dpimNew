<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeohrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceohrs', function (Blueprint $table) {
            $table->increments('ch_id');
            $table->string('ch_title')->nullable();
            $table->string('ch_fname')->nullable();
            $table->string('ch_lname')->nullable();
            $table->string('ch_phone')->nullable();
            $table->string('ch_position')->nullable();
            $table->string('ch_credit',255)->nullable();
            $table->string('FKch_userid')->nullable();
            $table->text('ch_note')->nullable();
            $table->integer('FKch_company')->nullable();
            $table->string('ch_userCreate')->nullable();
            $table->string('ch_userUpdate')->nullable();
            $table->string('ch_userDelete')->nullable();
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
        Schema::dropIfExists('ceohrs');
    }
}
