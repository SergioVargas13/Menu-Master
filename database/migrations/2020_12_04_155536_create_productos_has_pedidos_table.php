<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosHasPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_has_pedidos', function (Blueprint $table) {
            $table->id();
            $table->Integer('cantidad');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('pedido_id');
            $table->String('comentario');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
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
        Schema::dropIfExists('productos_has_pedidos');
    }
}
