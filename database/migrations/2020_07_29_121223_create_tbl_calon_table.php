<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_calon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_calon', 20);
            $table->string('id_pemilihan', 20);
            $table->string('nama', 30);
            $table->text('image');
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
        Schema::dropIfExists('tbl_calon');
    }
}
