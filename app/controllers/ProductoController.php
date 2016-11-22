<?php

class ProductoController extends \BaseController {

	public function search($search)
	{
		$productos = Producto::
		where('id', '=', $search)->
		orWhere('nombre', 'LIKE', '%'.$search.'%')->
		orWhere('descripcion', 'LIKE', '%'.$search.'%')->
		orWhere('precio_compra', 'LIKE', '%'.$search.'%')->
		orWhere('genero', 'LIKE', '%'.$search.'%')->
		orWhere('autor', 'LIKE', '%'.$search.'%')->
		orderBy('id','DESC')->get();
		
        return View::make('Productos.index')->with('productos',$productos);
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productos = Producto::orderBy('id','DESC')->get();
		return View::make('Productos.index')->with('productos',$productos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Productos.create');
	
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$producto = new Producto;
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$producto->precio_compra = Input::get('precio_compra');
		$producto->genero = Input::get('genero');
		$producto->autor = Input::get('autor');
		$producto->cantidad = Input::get('cantidad');
		$producto->save();
		return Redirect::to('libros');
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
		$producto = Producto::find($id);
		return View::make('Productos.edit')->with('producto',$producto);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$producto = Producto::find($id);
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$producto->precio_compra = Input::get('precio_compra');
		$producto->genero = Input::get('genero');
		$producto->autor = Input::get('autor');
		$producto->cantidad = Input::get('cantidad');
		$producto->save();
		
		return Redirect::to('libros');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Producto::find($id)->renta()->delete();
		$producto = Producto::find($id);
		$producto->delete();

		return Redirect::to('libros');
	}


}
