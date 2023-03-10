<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastScannedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_scanned', function (Blueprint $table) {
            $table->increments('id_last_scanned');
            $table->unsignedInteger('id_tamu');
            $table->enum('expired',['0','1'])->default('0');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            $table->foreign('id_tamu')->references('id_tamu')->on('tamu')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('last_scanned');
    }
}
