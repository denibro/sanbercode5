<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komen_jawabans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jawaban_id')->references('id_jawaban')->on('jawabans');
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
        Schema::dropIfExists('komen_jawabans');
    }
}
