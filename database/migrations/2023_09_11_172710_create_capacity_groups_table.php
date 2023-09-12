<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacityGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacity_groups', function (Blueprint $table) {
            $table->increments('ccg_id');
            $table->integer('FKcc_Company')->nullable();
            $table->integer('FKcc_Admin')->nullable();
            $table->string('ccg_userUpdate',255)->nullable();
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
        Schema::dropIfExists('capacity_groups');
    }
}
