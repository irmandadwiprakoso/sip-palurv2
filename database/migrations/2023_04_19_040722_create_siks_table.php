<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ktp_id');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->bigInteger('district_id');
            $table->bigInteger('village_id');
            $table->string('pkh');
            $table->string('bpnt');
            $table->string('pbi');
            $table->string('non_bansos');
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
        Schema::dropIfExists('siks');
    }
}
