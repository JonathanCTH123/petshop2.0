<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_factura_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('id_factura');
            $table->integer('id_articulo');
            $table->integer('cantidad');
            $table->float('precio_unitario', 8, 2);
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
        Schema::dropIfExists('tbl_factura_detalle');
    }
};
