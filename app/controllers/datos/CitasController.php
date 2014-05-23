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
		$data = Input::all();
		$citas = new Cita;
		$citas->id_paciente = $data['id_paciente'];
		$citas->id_medico = $data['id_medico'];
		$citas->peso = $data['peso'];
		$citas->fecha_ultrasonido = $data['fecha_ultrasonido'];
		$citas->fur = $data['fur'];
		$citas->fpp = $data['fpp'];
		$citas->afp = $data['afp'];
		$citas->id_metodo_afp = $data['metodo_afp'];
		$citas->ue3 = $data['ue3'];
		$citas->id_metodo_ue3 = $data['metodo_ue3'];
		$citas->inha = $data['inha'];
		$citas->id_metodo_inha = $data['metodo_inha'];
		$citas->hcg = $data['hcg'];
		$citas->id_metodo_hcg = $data['metodo_hcg'];
		$citas->pappa = $data['pappa'];
		$citas->id_metodo_pappa = $data['metodo_pappa'];
		$citas->tn = $data['tn'];
		$citas->id_metodo_tn = $data['metodo_tn'];
		$citas->fecha = $data['fecha'];
		$citas->edad_gestacional = $data['edad_gestacional'];
		$citas->observaciones = $data['observaciones'];
		$citas->estatura = $data['estatura'];
		$citas->id_institucion = $data['id_institucion'];
		$citas->save();
		
		return Redirect::route('datos.citas.show', $data['id_paciente']);	
		
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
		$form['citas'] = new Cita;
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
		$paciente = neW Paciente;
		$cita = Cita::find($id);
		$institucion = Institucion::find($cita->id_institucion);
		$cita->id_provincia = $institucion->id_provincia;
		$cita->id_tipo = $institucion->id_tipo_institucion;
		$datos = $paciente->datos_pacientes(0);
		$dato_paciente = $paciente->datos_pacientes($cita->id_paciente);
		$form['datos'] = array('route' => 'datos.citas.update', 'method' => 'PATCH');
		$form['label'] = 'Editar';
		$form['citas'] =  $cita;
		return View::make('datos/citas/list-edit-form')->with('pacientes', $datos)->with('datos', $dato_paciente)->with('form', $form);
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
