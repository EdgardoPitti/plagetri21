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
		//Variable que almacena los datos correspondientes para el formulario
		$datos['form'] = array('route' => 'datos.activos.store', 'method' => 'POST');
		//Variable que almacena la etiqueta del boton 
		$datos['label'] = 'Crear';
		//Se crea el objeto para mandar los valores a la vista sobre los activos
		$datos['activo'] = new Activo; 
		//Se retorna a la vista con los valores correspondientes
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
		//Se almacena en la variable data los campos recibidos del formulario
		$data = Input::all();
		//Se crea el objeto
		$activo = new Activo;
		//Se almacena en cada campo del objeto los valores traidos del formulario
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
		//Se retorna a la vista
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
		//Se crea el objeto del activo perteneciente al id que se recibio
		$datos['activo'] = Activo::find($id);
		//Se cargan los datos pertenecientes al formulario para editar el activo
		$datos['form'] = array('route' => array('datos.activos.update', $id), 'method' => 'PATCH');
		//se cambia la etiqueta del boton para que sepa que se esta es editando
		$datos['label'] = 'Editar';
		//Se retorna a la vista
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
		//Se cargan los datos que se traen del formulario
		$data = Input::all();
		//Se crea el objeto perteneciente al id que se recibio del activo
		$activo = Activo::find($id);
		//Se cargan los datos en los campos correspondientes
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
		//Se retorna a la vista
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
		//Se busca el activo perteneciente al id que se recibio
		$activo =  Activo::find($id);
		//Se elimina ese activo
		$activo->delete();
		//Se retorna al a vista 
		return Redirect::route('datos.activos.index');
	}


}
