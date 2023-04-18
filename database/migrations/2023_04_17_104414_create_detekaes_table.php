<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetekaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detekaes', function (Blueprint $table) {
            $table->id();
            $table->integer('ktp_id');
            $table->string('pkh');
            $table->string('bpnt');
            $table->string('pbi');
            $table->string('non_bansos');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->integer('district_id');
            $table->integer('village_id');

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
        Schema::dropIfExists('detekaes');
    }
}
