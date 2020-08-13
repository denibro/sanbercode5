<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_jawabans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tag');
            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('jawaban_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_jawabans');
    }
}
