<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fb',50);
            $table->string('ig',50);
            $table->string('twiter',50);
            $table->string('cp',50);
            $table->string('alamat',50);
            $table->string('email',50);
            $table->string('tlp',50);
            $table->string('logo',50);

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
        Schema::dropIfExists('web_setting');
    }
}
