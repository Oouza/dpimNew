<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {//28
            $table->increments('e_id');
            $table->string('e_title',255)->nullable();
            $table->string('e_fname',255)->nullable();
            $table->string('e_lname',255)->nullable();
            $table->string('e_phone',15)->nullable();
            $table->date('e_birth')->nullable();
            $table->string('e_gender')->nullable();
            $table->integer('e_status')->nullable();
            $table->integer('FKe_company')->nullable();
            $table->string('e_nameCompany')->nullable();
            $table->string('e_employeeNo',100)->nullable();
            $table->integer('FKe_department')->nullable();
            $table->string('e_nameDepartment',255)->nullable();
            $table->integer('FKe_departmentSub')->nullable();
            $table->string('e_nameDepartmentSub',255)->nullable();
            $table->integer('FKe_position')->nullable();
            $table->string('e_namePosition',255)->nullable();
            $table->integer('FKe_lavel')->nullable();
            $table->string('e_nameLavel',255)->nullable();
            $table->integer('FKe_group')->nullable();
            $table->string('e_nameGroup',255)->nullable();
            $table->string('e_credit',255)->nullable();
            $table->string('addressNO_now',255)->nullable();
            $table->integer('FKe_province_now')->nullable();
            $table->integer('FKe_amphur_now')->nullable();
            $table->integer('FKe_tambon_now')->nullable();
            $table->string('postcode_now',10)->nullable();
            $table->string('addressNO_past',255)->nullable();
            $table->integer('FKe_province_past')->nullable();
            $table->integer('FKe_amphur_past')->nullable();
            $table->integer('FKe_tambon_past')->nullable();
            $table->string('postcode_past')->nullable();
            $table->integer('FKe_userid')->nullable();
            $table->string('e_userCreate',255)->nullable();
            $table->string('e_userUpdate',255)->nullable();
            $table->string('e_userDelete',255)->nullable();
            $table->timestamps();
            $table->text('e_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
