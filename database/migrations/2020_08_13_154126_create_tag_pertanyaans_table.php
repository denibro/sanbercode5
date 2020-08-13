<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_pertanyaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tag');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('pertanyaan_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_pertanyaans');
    }
}
