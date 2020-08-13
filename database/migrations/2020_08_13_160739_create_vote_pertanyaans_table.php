<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_pertanyaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jml_votes');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pertanyaan_id')->references('id_pertanyaan')->on('pertanyaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_pertanyaans');
    }
}
