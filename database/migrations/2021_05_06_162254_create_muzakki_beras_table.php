<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuzakkiBerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muzakki_beras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',200);
            $table->string('alamat',200)->nullable();
            $table->string('rt',5)->nullable();
            $table->float('jumlahBeras');
            $table->string('keterangan',200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muzakki_beras');
    }
}
