<?php
class Cliente extends Eloquent {

	protected $table = 'clientes';

	public function renta()
	{
		return $this->hasMany('Renta');
	}
}