<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_rt', 20);
            $table->string('nama_rt', 30);
            $table->string('no_rw', 20);
            $table->string('keterangan', 225);
            $table->string('id_rt', 30);
            $table->boolean('status')->default('0')->unsigned();
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
        Schema::dropIfExists('tbl_rt');
    }
}
