<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidangpekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidangpekerjaans', function (Blueprint $table) {
            $table->increments('idbidangpekerjaan');
            $table->string('bidangpekerjaan');
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
        Schema::dropIfExists('bidangpekerjaans');
    }
}
