<?php

class ProveedoresController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datos['form'] = array('route' => 'proveedor.store', 'method' => 'POST');
		$datos['proveedor'] = new Proveedor;
		return View::make('datos/proveedores/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$proveedor = new Proveedor;
		$proveedor->nombre = $data['nombre'];
		$proveedor->ruc = $data['ruc'];
		$proveedor->telefono = $data['telefono'];
		$proveedor->direccion = $data['direccion'];
		$proveedor->detalle = $data['detalle'];
		$proveedor->save();

		return Redirect::route('proveedor.index');
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
		$datos['proveedor'] = Proveedor::find($id);
		$datos['form'] = array('route'=> array('proveedor.update', $id), 'method' => 'PATCH');		
		return View::make('datos/proveedores/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$proveedor = Proveedor::find($id);
		$proveedor->nombre = $data['nombre'];
		$proveedor->ruc = $data['ruc'];
		$proveedor->telefono = $data['telefono'];
		$proveedor->direccion = $data['direccion'];
		$proveedor->detalle = $data['detalle'];
		$proveedor->save();

		return Redirect::route('proveedor.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
