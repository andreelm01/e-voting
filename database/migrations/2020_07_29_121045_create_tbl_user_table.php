<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_user', 20);
            $table->string('nama', 30);
            $table->text('alamat');
            $table->string('no_rumah', 30);
            $table->string('no_rt', 20);
            $table->string('no_rw', 20);
            $table->string('username', 30);
            $table->string('password', 225);
            $table->string('id_pemilihan', 20);
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
        Schema::dropIfExists('tbl_user');
    }
}
