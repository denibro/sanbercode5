<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->bigIncrements('id_jawaban');
            $table->string('isi');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pertanyaan_id')->references('id_pertanyaan')->on('pertanyaans');
            $table->foreign('tag_id')->references('id')->on('tag_jawabans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabans');
    }
}
