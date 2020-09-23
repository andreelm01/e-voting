<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPemilihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pemilihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pemilihan', 20);
            $table->string('no_rw', 20);
            $table->string('no_rt', 20);
            $table->string('keterangan', 225);
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
        Schema::dropIfExists('tbl_pemilihan');
    }
}
