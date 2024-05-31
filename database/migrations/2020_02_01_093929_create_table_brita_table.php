<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_brita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul',30);
            $table->string('foto',70);
            $table->text('keterangan');
            $table->string('views',30);
            $table->string('penulis',30);
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
        Schema::dropIfExists('table_brita');
    }
}
