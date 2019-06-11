<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenispekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenispekerjaans', function (Blueprint $table) {
            $table->increments('idjenispekerjaan');
            $table->string('jenispekerjaan');
            $table->string('usercreated');
            $table->string('userupdated');
            $table->boolean('aktiv');
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
        Schema::dropIfExists('jenispekerjaans');
    }
}
