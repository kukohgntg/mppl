<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan_desa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('keterangan');
            $table->string('jumlah',30);
            $table->string('tanggal',30);
            $table->string('user_id',30);
            $table->string('sumber',30);

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
        Schema::dropIfExists('pemasukan_desa');
    }
}
