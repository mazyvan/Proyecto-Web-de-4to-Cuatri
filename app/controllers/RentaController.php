<?php

class RentaController extends \BaseController {


	public function search($search)
	{
		$rentas = Renta::
		join('clientes', 'clientes.id', '=', 'rentas.cliente_id')->
		join('productos', 'productos.id', '=', 'rentas.producto_id')->
		select('rentas.*', 'clientes.nombres', 'clientes.apellidos', 'productos.nombre' )->

		where('clientes.nombres', 'LIKE', '%'.$search.'%')->
		orWhere('clientes.apellidos', 'LIKE', '%'.$search.'%')->
		orWhere('productos.nombre', 'LIKE', '%'.$search.'%')->
		orWhere('rentas.observaciones', 'LIKE', '%'.$search.'%')->
		orWhere('rentas.precio_renta', '=', $search)->
		orWhere('rentas.anticipo', '=', $search)->
		orWhere('rentas.saldo', '=', $search)->
		orWhere('rentas.fecha_entrega', 'LIKE', '%'.$search.'%')->
		orWhere('rentas.fecha_devolucion', 'LIKE', '%'.$search.'%')->

		orderBy('rentas.id','DESC')->

		get();
		
		
        return View::make('Rentas.index')->with('rentas',$rentas);
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rentas = Renta::orderBy('id','DESC')->get();
		return View::make('Rentas.index')->with('rentas',$rentas);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clientes = Cliente::orderBy('id','DESC')->get();
		$productos = Producto::orderBy('id','DESC')->get();
		return View::make('Rentas.create')->with('clientes',$clientes)->with('productos',$productos);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$cliente = Cliente::find(Input::get('cliente_id'));
		$producto = Producto::find(Input::get('producto_id'));

		$renta = new Renta;

		$renta->cliente()->associate($cliente);
		$renta->producto()->associate($producto);
		$renta->precio_renta = Input::get('precio_renta');
		$renta->anticipo = Input::get('anticipo');
		$renta->saldo = Input::get('precio_renta') - Input::get('anticipo');
		$renta->pagare_firmado = Input::get('pagare_firmado');
		$renta->fecha_entrega = Input::get('fecha_entrega');
		$renta->fecha_devolucion = Input::get('fecha_devolucion');

		$renta->save();

		$producto->no_rentas = (($producto->no_rentas)+1);
		$producto->save();

		return Redirect::to('/');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$renta = Renta::find($id);
		return View::make('Rentas.edit')->with('renta', $renta);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$renta = Renta::find($id);
		$renta->precio_renta = Input::get('precio_renta');
		$renta->anticipo = Input::get('anticipo');
		$renta->saldo = Input::get('precio_renta') - Input::get('anticipo');
		$renta->pagare_firmado = Input::get('pagare_firmado');
		$renta->fecha_entrega = Input::get('fecha_entrega');
		$renta->fecha_devolucion = Input::get('fecha_devolucion');

		if ((Input::get('cerrada')) == ($renta->cerrada)) {
			
		}else{
			$producto = Producto::find($renta->producto_id);

			if ((Input::get('cerrada')) == 1 ) {
				$producto->no_rentas = (($producto->no_rentas)-1);
			}else{
				$producto->no_rentas = (($producto->no_rentas)+1);
			}
			$producto->save();
		}

		$renta->cerrada = Input::get('cerrada');

		$renta->observaciones = Input::get('observaciones');

		$renta->save();

		return Redirect::to('/');		
	}

	public function finalizar($id)
	{
		$renta = Renta::find($id);
		$renta->cerrada = 1;
		$renta->observaciones = Input::get('observaciones');

		$producto = Producto::find($renta->producto_id);
		$producto->no_rentas = (($producto->no_rentas)-1);
		$producto->save();


		$renta->save();

		return Redirect::to('/');		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$renta = Renta::find($id);

		$producto = Producto::find($renta->producto_id);
		if (($renta->cerrada) === 0) {
			$producto->no_rentas = (($producto->no_rentas)-1);
		}
		$producto->save();

		$renta->delete();

		return Redirect::to('/');
	}


}
