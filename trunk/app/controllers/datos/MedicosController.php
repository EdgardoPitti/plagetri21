<?php

class Datos_MedicosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medico = new Medico;
		$datos['formulario'] = array('route' => 'datos.medicos.store', 'method' => 'POST');
		$datos['label'] = 'Crear';
		$datos['medico'] = $medico; 
		$datos['especialidad'] = '25';
		return View::make('datos/medicos/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $medico = new Medico;
        $data = Input::all();
        $medico->cedula = $data['cedula'];
        $medico->primer_nombre = $data['primer_nombre'];
        $medico->segundo_nombre = $data['segundo_nombre'];
        $medico->apellido_paterno = $data['apellido_paterno'];
        $medico->apellido_materno = $data['apellido_materno'];
        $medico->sexo = $data['sexo'];
        $medico->id_especialidades_medicas = $data['id_especialidades_medicas'];
        $medico->celular = $data['celular'];
        $medico->telefono = $data['telefono'];
        $medico->email = $data['email'];
        $medico->save();
        return Redirect::route('datos.medicos.index');
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
		$medico = Medico::find($id);
		if(is_null ($medico)){
			App::abort(404);
		}
		$datos['formulario'] = array('route' => array('datos.medicos.update',$id), 'method' => 'PATCH');
		$datos['label'] = 'Editar';
		$datos['medico'] = $medico; 
		$datos['especialidad'] = $medico->id_especialidades_medicas;
		return View::make('datos/medicos/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$medico = Medico::find($id);
		if(is_null($medico)){
			$medico = new Medico();
		}
		$data = Input::all();
        $medico->cedula = $data['cedula'];
        $medico->primer_nombre = $data['primer_nombre'];
        $medico->segundo_nombre = $data['segundo_nombre'];
        $medico->apellido_paterno = $data['apellido_paterno'];
        $medico->apellido_materno = $data['apellido_materno'];
        $medico->sexo = $data['sexo'];
        $medico->id_especialidades_medicas = $data['id_especialidades_medicas'];
        $medico->celular = $data['celular'];
        $medico->telefono = $data['telefono'];
        $medico->email = $data['email'];
        $medico->save();
        return Redirect::route('datos.medicos.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$medico = Medico::find($id);
		$medico->delete();
		$medico = new Medico;

		$datos['medico'] = $medico;
		return View::make('datos/medicos/list-edit-form')->with('datos', $datos);
	}


}