<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaHasProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_has_productos', function (Blueprint $table) {
            $table->id();
            $table->Integer('cantidad');
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('producto_id');

            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('facturas_has_productos');
    }
}
