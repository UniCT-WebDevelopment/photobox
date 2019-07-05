<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dataVoto');
            $table->integer('like');
            $table->bigInteger('idUtente');
            $table->bigInteger('idPhoto');
            $table->timestamps();

            $table->foreign('idUtente')->references('id')->on('users');
            $table->foreign('idPhoto')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voti');
    }
}
