<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('goals_id');
            $table->integer('FKgoals_employee')->nullable();
            $table->string('goals_nameemployee',255)->nullable();
            $table->integer('FKgoals_skillsSub')->nullable();
            $table->string('goals_nameskillsSub',255)->nullable();
            $table->year('goals_year')->nullable();
            $table->integer('goals_status')->nullable();
            $table->text('goals_note')->nullable();
            $table->string('goals_userDelete',255)->nullable();
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
        Schema::dropIfExists('goals');
    }
}
