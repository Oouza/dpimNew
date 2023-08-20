<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_subs', function (Blueprint $table) {
            $table->increments('ds_id');
            $table->string('ds_name',255)->nullable();
            $table->integer('FKds_department')->nullable();
            $table->string('ds_namedepartment',255)->nullable();
            $table->integer('FKds_company')->nullable();
            $table->string('ds_delete',255)->nullable();
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
        Schema::dropIfExists('department_subs');
    }
}
