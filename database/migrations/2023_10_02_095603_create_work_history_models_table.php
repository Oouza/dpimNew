<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkHistoryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_history', function (Blueprint $table) {
            $table->id('wh_id');
            $table->integer('FKwh_employeeid')->comment('ไอดี Employee')->nullable();
            $table->integer('FKwh_userid')->comment('ไอดี user')->nullable();
            $table->string('wh_datefrom',255)->comment('ปีที่เริ่มทำงาน')->nullable();
            $table->string('wh_dateto',255)->comment('ปีที่สิ้นสุดการทำงาน')->nullable();
            $table->string('wh_agencies',255)->comment('หน่วยงาน')->nullable();
            $table->string('wh_position',255)->comment('ตำแหน่ง')->nullable();
            $table->string('wh_credit',255)->comment('แนบเอกสาร')->nullable();
            $table->string('wh_note',255)->comment('หมายเหตุ')->nullable();
            $table->string('wh_userCreate',255)->comment('ชื่อคนสร้าง')->nullable();
            $table->string('wh_userUpdate',255)->comment('ชื่อคนแก้ไข')->nullable();
            $table->string('wh_userDelete',255)->comment('ชื่อคนลบ')->nullable();
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
        Schema::dropIfExists('work_history');
    }
}
