<?php

class Datos_MantenimientosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('datos/mantenimientos/list-edit-form')->with('objeto', new Mantenimiento);
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
		$mantenimentos = new Mantenimiento;
		$mantenimentos->fecha_realizacion = $data['fecha'];
		$mantenimentos->realizado_por = $data['realizado_por'];
		$mantenimentos->aprobado_por = $data['aprobado_por'];
		$mantenimentos->id_activo = $data['id_activo'];
		$mantenimentos->proximo_mant = $data['proximo'];
		$mantenimentos->observacion = $data['observacion'];
		$mantenimentos->save();
		return Redirect::route('datos.mantenimientos.show', $data['id_activo']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{	
		$datos['form'] = array('route' => 'datos.mantenimientos.store', 'method' => 'POST');
		$datos['label'] = 'Crear';
		$datos['mantenimiento'] = new Mantenimiento; 
		$datos['activo'] = Activo::find($id);
		return View::make('datos/mantenimientos/list-edit-form')->with('datos', $datos)->with('objeto', new Mantenimiento);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$datos['label'] = 'Editar';
		$datos['form'] = array('route' => array('datos.mantenimientos.update', $id), 'method' => 'PATCH');
		$datos['mantenimiento'] = Mantenimiento::find($id);
		$datos['activo'] = Activo::find($datos['mantenimiento']->id_activo);
		return View::make('datos/mantenimientos/list-edit-form')->with('datos', $datos)->with('objeto', new Mantenimiento);
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
		$mantenimentos = Mantenimiento::find($id);
		$mantenimentos->fecha_realizacion = $data['fecha'];
		$mantenimentos->realizado_por = $data['realizado_por'];
		$mantenimentos->aprobado_por = $data['aprobado_por'];
		$mantenimentos->id_activo = $data['id_activo'];
		$mantenimentos->proximo_mant = $data['proximo'];
		$mantenimentos->observacion = $data['observacion'];
		$mantenimentos->save();
		return Redirect::route('datos.mantenimientos.show', $data['id_activo']);
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
