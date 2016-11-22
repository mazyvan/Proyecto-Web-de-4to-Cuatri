<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function($table){ 
		    $table->increments('id');
            $table->string('nombre', 30);
            $table->text('descripcion');
            $table->float('precio_compra');
            $table->string('genero', 30);
            $table->string('autor', 30);
            $table->integer('no_rentas');
            $table->integer('cantidad');
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
		Schema::drop('productos');
	}

}
