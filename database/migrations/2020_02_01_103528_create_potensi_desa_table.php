<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotensiDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi_desa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_potensi',30);
            $table->string('alamat',30);
            $table->string('foto',30);
            $table->text('keterangan');
            $table->string('kategori',30);
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
        Schema::dropIfExists('potensi_desa');
    }
}
