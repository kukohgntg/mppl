<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructurDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struktur_desa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',30);
            $table->string('masa_jabatan',30);
            $table->string('foto',50);
            $table->string('jabatan',30);
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
        Schema::dropIfExists('struktur_desa');
    }
}
