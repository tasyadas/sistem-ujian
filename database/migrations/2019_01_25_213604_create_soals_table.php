<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('soal');
            $table->string('image')->nullable();
            $table->string('A');
            $table->string('B');
            $table->string('C');
            $table->string('D');
            $table->string('E')->nullable();
            $table->string('kunci');
            $table->integer('cluster_id')->unsigned();
            $table->foreign('cluster_id')->references('id')->on('clusters')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('soals');
    }
}
