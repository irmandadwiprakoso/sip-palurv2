<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaposyanduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('namaposyandu', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipekesehatan_id');
            $table->string('alamat');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->integer('nama_pimpinan');
            $table->integer('statustanah_id');
            $table->integer('no_HP');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->integer('foto');
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
        Schema::dropIfExists('namaposyandu');
    }
}
