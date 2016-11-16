<?php

class ClienteController extends \BaseController {

	public function search($search)
	{
		$clientes = Cliente::
		where('id', '=', $search)->
		orWhere('nombres', 'LIKE', '%'.$search.'%')->
		orWhere('apellidos', 'LIKE', '%'.$search.'%')->
		orWhere('direccion', 'LIKE', '%'.$search.'%')->
		orWhere('colonia', 'LIKE', '%'.$search.'%')->
		orWhere('telefono', 'LIKE', '%'.$search.'%')->
		orWhere('celular', 'LIKE', '%'.$search.'%')->
		orderBy('id','DESC')->get();
		
        return View::make('Clientes.index')->with('clientes', $clientes);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$clientes = Cliente::orderBy('id','DESC')->get();
        return View::make('Clientes.index')->with('clientes', $clientes);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Clientes.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$cliente = new Cliente;

		$cliente->nombres = Input::get('nombres');
		$cliente->apellidos = Input::get('apellidos');
		$cliente->direccion = Input::get('direccion');
		$cliente->colonia = Input::get('colonia');
		$cliente->telefono = Input::get('telefono');
		$cliente->celular = Input::get('celular');

		$cliente->save();
		
    	return Redirect::to('rentas/create');

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
		$cliente = Cliente::find($id);
		return View::make('Clientes.edit')->with('cliente', $cliente);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = Cliente::find($id);
		$cliente->nombres = Input::get('nombres');
		$cliente->apellidos = Input::get('apellidos');
		$cliente->direccion = Input::get('direccion');
		$cliente->colonia = Input::get('colonia');
		$cliente->telefono = Input::get('telefono');
		$cliente->celular = Input::get('celular');
		$cliente->save();

    	return Redirect::to('clientes');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cliente::find($id)->renta()->delete();
		$cliente = Cliente::find($id);
		$cliente->delete();
		return Redirect::to('clientes');
	}
}
