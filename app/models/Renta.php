<?php
class Renta extends Eloquent {

	protected $table = 'rentas';
    
    public function cliente()	
    {
    	return $this->belongsTo('Cliente');
    }
    public function producto()
    {
    	return $this->belongsTo('Producto');
    }
}