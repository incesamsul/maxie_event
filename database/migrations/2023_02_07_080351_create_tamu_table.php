<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamu', function (Blueprint $table) {
            $table->increments('id_tamu');
            $table->string('no_team');
            $table->string('facebook');
            $table->string('whatsapp');
            $table->string('kota_asal');
            $table->enum('status',['agen','distributor','stokis']);
            $table->enum('status_kehadiran',['0','1']);
            $table->enum('konfirmasi_tamu', ['0','1'])->default('0');
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
        Schema::dropIfExists('tamu');
    }
}
