<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('plans_id');
            $table->integer('FKplans_employee')->nullable();
            $table->string('plans_nameemployee',255)->nullable();
            $table->integer('FKplans_course')->nullable();
            $table->string('plans_namecourse',255)->nullable();
            $table->integer('FKplans_capacity')->nullable();
            $table->string('plans_namecapacity',255)->nullable();
            $table->integer('FKplans_skills')->nullable();
            $table->string('plans_nameskills',255)->nullable();
            $table->integer('FKplans_skillssub')->nullable();
            $table->string('plans_nameskillssub',255)->nullable();
            $table->date('plans_datestart')->nullable();
            $table->date('plans_dateend')->nullable();
            $table->integer('plans_moneycouser')->nullable();
            $table->integer('plans_moneyother')->nullable();
            $table->integer('plans_status')->nullable();
            $table->text('plans_note')->nullable();
            $table->string('plans_userDelete',255)->nullable();
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
        Schema::dropIfExists('plans');
    }
}
