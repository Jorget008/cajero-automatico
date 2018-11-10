<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('tipo_cuenta_id');
            $table->foreign('tipo_cuenta_id')->references('id')->on('tipo_cuentas');

            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->integer('saldo');
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
        Schema::dropIfExists('cuentas');
    }
}
