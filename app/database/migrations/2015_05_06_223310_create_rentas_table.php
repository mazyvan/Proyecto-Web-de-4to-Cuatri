<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rentas', function($table) {
			$table->increments('id');
			$table->integer('cliente_id');
			$table->integer('producto_id');
			$table->text('observaciones');
			$table->float('precio_renta');
			$table->float('anticipo');
			$table->float('saldo');
			$table->float('recargo');

			$table->boolean('pagare_firmado');

			$table->date('fecha_entrega');
			$table->date('fecha_devolucion');

			$table->boolean('cerrada')->default(0);
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
		Schema::drop('rentas');
	}

}
