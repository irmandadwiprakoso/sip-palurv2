<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtks', function (Blueprint $table) {
            $table->id();
            $table->integer('ktp_id');
            $table->string('PKH');
            $table->string('BPNT');
            $table->string('PBI');
            $table->string('NON_BANSOS');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->string('keterangan');
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
        Schema::dropIfExists('dtks');
    }
}
