<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_nameCompany',255)->nullable();
            $table->string('c_licenseNo',255)->nullable();
            $table->date('c_startDate')->nullable();
            $table->date('c_endDate')->nullable();
            $table->string('FKc_typemineral',255)->nullable();
            $table->string('c_nameTypeMineral',255)->nullable();
            $table->string('c_typeMineralSub',255)->nullable();
            $table->string('c_typeCompany',255)->nullable();
            $table->string('c_phone',15)->nullable();
            $table->string('c_addressNo',255)->nullable();
            $table->string('FKc_provinces',255)->nullable();
            $table->string('FKc_amphur',255)->nullable();
            $table->string('FKc_tumbon',255)->nullable();
            $table->string('c_postCode',255)->nullable();
            $table->integer('FKc_manager')->nullable();
            $table->integer('FKc_hr')->nullable();
            $table->string('c_userCreate',255)->nullable();
            $table->string('c_userUpdate',255)->nullable();
            $table->string('c_userDelete',255)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
