<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_positions', function (Blueprint $table) {
            $table->increments('sp_id');
            $table->integer('FKgsp_department')->nullable();
            $table->string('sp_namedepartment',255)->nullable();
            $table->integer('FKgsp_departmentSub')->nullable();
            $table->string('sp_namedepartmentSub',255)->nullable();
            $table->integer('FKgsp_position')->nullable();
            $table->string('sp_nameposition',255)->nullable();
            $table->integer('FKgsp_groupJob')->nullable();
            $table->string('sp_namegroupJob',255)->nullable();
            $table->string('sp_detail',255)->nullable();
            $table->integer('FKgsp_typeJob')->nullable();
            $table->string('sp_nametypeJob',255)->nullable();
            $table->integer('FKgsp_lavel')->nullable();
            $table->string('sp_namelavel',255)->nullable();
            $table->integer('FKgsp_company')->nullable();
            $table->string('sp_delete',255)->nullable();
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
        Schema::dropIfExists('setting_positions');
    }
}
