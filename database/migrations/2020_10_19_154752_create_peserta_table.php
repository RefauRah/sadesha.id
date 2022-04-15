<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_diklat');
            $table->integer('id_user');
            $table->integer('id_kota');
            $table->string('no_peserta')->unique();
            $table->string('nama_peserta');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->text('alamat');
            $table->string('tipe_peserta');
            $table->string('no_hp');
            $table->string('email');
            $table->string('qr_code');
            $table->integer('is_verified');
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
        Schema::dropIfExists('peserta');
    }
}
