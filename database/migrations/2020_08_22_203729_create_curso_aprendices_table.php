<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoAprendicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_aprendices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('aprendiz_id');

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('aprendiz_id')->references('id')->on('users');
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
        Schema::dropIfExists('curso_aprendices');
    }
}
