<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePospinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pospin', function (Blueprint $table) {
            $table->id();
            $table->integer('ktp_id');
            $table->integer('saranakesehatan_id');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->string('pin_1');
            $table->string('lokasi_1');
            $table->string('pin_2');
            $table->string('lokasi_2');
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
        Schema::dropIfExists('pospin');
    }
}
