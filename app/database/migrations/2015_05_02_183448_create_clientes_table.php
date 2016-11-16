<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function($table){ 
		    $table->increments('id');
            $table->string('nombres', 30);
            $table->string('apellidos', 30);
            $table->string('direccion', 35);
            $table->string('colonia', 30);
            $table->string('telefono', 15);
            $table->string('celular', 15);
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
		Schema::drop('clientes');
	}

}
