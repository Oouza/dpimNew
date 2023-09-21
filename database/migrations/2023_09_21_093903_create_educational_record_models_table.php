<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalRecordModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_record', function (Blueprint $table) {
            $table->id('er_id');
            $table->integer('FKer_employeeid')->comment('ไอดี Employee')->nullable();
            $table->integer('FKer_userid')->comment('ไอดี user')->nullable();
            $table->string('er_datefrom',255)->comment('ปีที่เข้าการศึกษา')->nullable();
            $table->string('er_dateto',255)->comment('ปีที่จบการศึกษา')->nullable();
            $table->string('er_qualification',255)->comment('วุติที่ได้รับ')->nullable();
            $table->string('er_Nameinstitution',255)->comment('ชื่อสถาบัน')->nullable();
            $table->string('er_credit',255)->comment('แนบเอกสาร')->nullable();
            $table->string('er_note',255)->comment('หมายเหตุ')->nullable();
            $table->string('er_userCreate',255)->comment('ชื่อคนสร้าง')->nullable();
            $table->string('er_userUpdate',255)->comment('ชื่อคนแก้ไข')->nullable();
            $table->string('er_userDelete',255)->comment('ชื่อคนลบ')->nullable();
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
        Schema::dropIfExists('educational_record');
    }
}
