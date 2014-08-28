<?php

class Datos_ActivosController extends BaseController {

	public function __construct(){
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datos['form'] = array('route' => 'datos.activos.store', 'method' => 'POST');
		$datos['label'] = 'Crear';
		$datos['activo'] = new Activo; 
		return View::make('datos/activos/list-edit-form')->with('datos', $datos);
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
		$activo = new Activo;
		$activo->codigo = $data['codigo'];
		$activo->nombre = $data['nombre'];
		$activo->descripcion = $data['descripcion'];
		$activo->id_tipo = $data['tipo'];
		$activo->marca = $data['marca'];
		$activo->id_nivel = $data['nivel'];
		$activo->id_ubicacion = $data['ubicacion'];
		$activo->fecha_compra = $data['fecha_compra'];
		$activo->num_factura = $data['num_factura'];
		$activo->id_proveedor = $data['proveedor'];
		$activo->costo = $data['costo'];
		$activo->save();
		return Redirect::route('datos.activos.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{


	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$datos['activo'] = Activo::find($id);
		$datos['form'] = array('route' => array('datos.activos.update', $id), 'method' => 'PATCH');
		$datos['label'] = 'Editar';
		return View::make('datos/activos/list-edit-form')->with('datos', $datos);
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
		$activo = Activo::find($id);
		$activo->codigo = $data['codigo'];
		$activo->nombre = $data['nombre'];
		$activo->descripcion = $data['descripcion'];
		$activo->id_tipo = $data['tipo'];
		$activo->marca = $data['marca'];
		$activo->id_nivel = $data['nivel'];
		$activo->id_ubicacion = $data['ubicacion'];
		$activo->fecha_compra = $data['fecha_compra'];
		$activo->num_factura = $data['num_factura'];
		$activo->id_proveedor = $data['proveedor'];
		$activo->costo = $data['costo'];
		$activo->save();
		return Redirect::route('datos.activos.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$activo =  Activo::find($id);
		$activo->delete();
		
		$datos['form'] = array('route' => 'datos.activos.store', 'method' => 'POST');
		$datos['label'] = 'Crear';
		$datos['activo'] = new Activo; 
		return View::make('datos/activos/list-edit-form')->with('datos', $datos);
	}


}
