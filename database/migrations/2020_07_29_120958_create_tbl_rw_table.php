<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rw', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_rw', 20);
            $table->string('nama_rw', 30);
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
        Schema::dropIfExists('tbl_rw');
    }
}
