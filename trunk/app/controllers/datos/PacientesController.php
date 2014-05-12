<?php

class Datos_PacientesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paciente = new Paciente;

		$pacientes = Paciente::all();

		$datos['form'] = array('route' => 'datos.pacientes.store', 'method' => 'POST');
      	$datos['label'] = 'Crear';

      	$datos['provincias'] = Provincia::lists('provincia','id_provincia');
      	
      	$datos['distritos'] = Distrito::lists('distrito','id_distrito');
		
      	$datos['corregimientos'] = Corregimiento::lists('corregimiento','id_corregimiento');    

      	$datos['nacionalidades'] = Nacionalidad::lists('nacionalidad', 'id_nacionalidad');

      	$datos['etnias'] =  Etnia::lists('etnia', 'id_etnia');

      	$datos['tipos_sangre'] = Tiposangre::lists('tipo_sangre', 'id_tipo_sanguineo');
	
		$datos['razas'] = Raza::lists('raza', 'id_razas');


		$datos['paciente'] = $paciente;
		$datos['pacientes'] = $pacientes;
       return View::make('datos/pacientes/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$paciente = new Paciente;
		return View::make('datos/pacientes/form')->with('paciente', $paciente);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $paciente = new Paciente;
        $data = Input::all();
        $paciente->cedula = $data['cedula'];
        $paciente->primer_nombre = $data['primer_nombre'];
        $paciente->segundo_nombre = $data['segundo_nombre'];
        $paciente->apellido_paterno = $data['apellido_paterno'];
        $paciente->apellido_materno = $data['apellido_materno'];
        $paciente->sexo = '0';
        $paciente->fecha_nacimiento = $data['fecha_nacimiento'];
        $paciente->lugar_nacimiento = $data['lugar_nacimiento'];
        $paciente->id_provincia_nacimiento = $data['id_provincia'];
        $paciente->id_distrito_nacimiento = $data['id_distrito'];
        $paciente->id_corregimiento_nacimiento = $data['id_corregimiento'];
        $paciente->telefono = $data['telefono'];
        $paciente->celular = $data['celular'];
        $paciente->email = $data['email'];
        $paciente->id_nacionalidad = $data['id_nacionalidad'];
        $paciente->id_tipo_sangre = $data['id_tipo_sanguineo'];
        $paciente->id_raza = $data['id_raza'];
        $paciente->id_etnia = $data['id_etnia'];
        $paciente->diabetes = $data['diabetes'];
        $paciente->save();

        return Redirect::route('datos.pacientes.index');	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$paciente = Paciente::find($id);
		return View::make('datos/pacientes/show')->with('paciente', $paciente);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pacientes = Paciente::all();
		$datos['pacientes'] = $pacientes;
		$paciente = Paciente::find($id);
		if (is_null ($paciente))
		{
		 App::abort(404);
		}
      	$datos['provincias'] = Provincia::lists('provincia','id_provincia');
      	
      	$datos['distritos'] = Distrito::lists('distrito','id_distrito');

      	$datos['id_provincia'] = $paciente->id_provincia_nacimiento;
		
      	$datos['corregimientos'] = Corregimiento::lists('corregimiento','id_corregimiento');    

      	$datos['nacionalidades'] = Nacionalidad::lists('nacionalidad', 'id_nacionalidad');

      	$datos['etnias'] =  Etnia::lists('etnia', 'id_etnia');

      	$datos['tipos_sangre'] = Tiposangre::lists('tipo_sangre', 'id_tipo_sanguineo');
	
		$datos['razas'] = Raza::lists('raza', 'id_razas');	
		$datos['form'] =  array('route' => array('datos.pacientes.update', $id), 'method' => 'PATCH');
      	$datos['label']= 'Editar';
		$datos['paciente'] = $paciente;
		return View::make('datos/pacientes/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$paciente = Paciente::find($id);
		$data = Input::all();
        $paciente->cedula = $data['cedula'];
        $paciente->primer_nombre = $data['primer_nombre'];
        $paciente->segundo_nombre = $data['segundo_nombre'];
        $paciente->apellido_paterno = $data['apellido_paterno'];
        $paciente->apellido_materno = $data['apellido_materno'];
        $paciente->lugar_nacimiento = $data['lugar_nacimiento'];
        $paciente->edad_paciente = $data['edad_paciente'];
        $paciente->peso = $data['peso'];
        $paciente->save();
        return Redirect::route('datos.pacientes.index');	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$paciente = Paciente::find($id);
		$paciente->delete();
		$paciente = new Paciente;

		$pacientes = Paciente::all();

		$datos['paciente'] = $paciente;
		$datos['pacientes'] = $pacientes;
       return View::make('datos/pacientes/list-edit-form')->with('datos', $datos);
	}


}
