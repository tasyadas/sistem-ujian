<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jawaban')->nullable();
            $table->integer('soal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('soal_id')->references('id')->on('soals');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('soal_user');
    }
}
