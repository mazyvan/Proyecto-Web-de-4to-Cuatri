<?php
class Producto extends Eloquent {

	protected $table = 'productos';

	public function renta()
	{
		return $this->hasMany('Renta');
	}
	
}