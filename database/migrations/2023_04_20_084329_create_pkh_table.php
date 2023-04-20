<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkh', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ktp_id');
            $table->integer('statusdtks_id');
            $table->string('keterangan');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->bigInteger('district_id');
            $table->bigInteger('village_id');
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
        Schema::dropIfExists('pkh');
    }
}
