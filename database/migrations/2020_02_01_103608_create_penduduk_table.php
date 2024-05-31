<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap',50);
            $table->string('nik',40);
            $table->string('jenis_klamin',10);
            $table->string('tampat_lahir',40);
            $table->string('tanggal_lahir',30);
            $table->string('agama',10);
            $table->string('pendidikan',30);
            $table->string('pekerjaan',30);
            $table->string('no_kk',30);

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
        Schema::dropIfExists('penduduk');
    }
}
