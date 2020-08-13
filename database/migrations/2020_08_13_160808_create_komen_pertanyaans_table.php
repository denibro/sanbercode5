<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komen_pertanyaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pertanyaan_id')->references('id_pertanyaan')->on('pertanyaans');
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
        Schema::dropIfExists('komen_pertanyaans');
    }
}
