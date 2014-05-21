<?php

class Datos_CitasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paciente = neW Paciente;
		$datos = $paciente->datos_pacientes(0);
		return View::make('datos/citas/list-edit-form')->with('pacientes', $datos);
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
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{
		$paciente = neW Paciente;
		$datos = $paciente->datos_pacientes(0);
		$dato_paciente = $paciente->datos_pacientes($id);
		$form['datos'] = array('route' => 'datos.citas.store', 'method' => 'POST');
		$form['label'] = 'Crear';
		$form['citas'] = new Citas;
		return View::make('datos/citas/list-edit-form')->with('pacientes', $datos)->with('datos', $dato_paciente)->with('form', $form);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
