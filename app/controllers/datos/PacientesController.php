<?php

class Datos_PacientesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datos['form'] = array('route' => 'datos.pacientes.store', 'method' => 'POST');
      	$datos['label'] = 'Crear';
		$datos['paciente'][0] = new Paciente;
		$datos['paciente'][0]->foto = 'default.png';

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
		$data = Input::all();  
		$foto = Input::file("foto");
        $paciente = new Paciente;
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
        $paciente->id_provincia_residencia = $data['id_provincia_residencia'];
        $paciente->id_distrito_residencia = $data['id_distrito_residencia'];
        $paciente->id_corregimiento_residencia = $data['id_corregimiento_residencia'];
        $paciente->lugar_residencia = $data['lugar_residencia'];
        $paciente->id_raza = $data['id_raza'];
        $paciente->id_etnia = $data['id_etnia'];
        $paciente->diabetes = $data['diabetes'];
        $paciente->embarazo_trisomia = $data['embarazo_trisomia'];
        $paciente->fuma = $data['fuma'];
        $paciente->save();
        //Almacenamiento de Foto
        if(!is_null($foto)){
	        $id = Paciente::all()->last()->id;
	        $extension = $foto->getClientOriginalExtension();
	        $nombre_foto = 'p_'.$id.'.'.$extension;
	        $paciente = Paciente::find($id);
	        $paciente->foto = $nombre_foto;
	        $paciente->save();
	        $foto->move("imgs",$nombre_foto);
		}
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

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paciente = new Paciente;
		$datos['form'] =  array('route' => array('datos.pacientes.update', $id), 'method' => 'PATCH');
      	$datos['label']= 'Editar';
		$datos['paciente'] = $paciente->datos_pacientes($id);
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
		$foto = Input::file('foto');
		$paciente = Paciente::find($id);
		$data = Input::all();
		//Pregunto si no es nulo la variable foto y asi saber si seleccione una nueva foto
		if(!is_null($foto)){
			//Si no es nulo fue que seleccione una foto
			//Extraigo la extension de la foto
			$extension = $foto->getClientOriginalExtension();
			//Armo el nombre de la foto con el id y la extension de la nueva foto
			$nombre_foto = 'p_'.$id.'.'.$extension;
			//Ingreso el nuevo nombre de la foto en la base de datos con todo y extension
			$paciente->foto = $nombre_foto;
			//Busco en la carpeta de foto si existe alguna foto con ese mismo nombre y extension y la elimino
			File::delete('./imgs/'.$nombre_foto);
			//Muevo la nueva foto a la carpeta imgs
			$foto->move("imgs", $nombre_foto);	
		}
		if(is_null($paciente))
		{
		 	$paciente = new Paciente;
		}
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
        $paciente->id_provincia_residencia = $data['id_provincia_residencia'];
        $paciente->id_distrito_residencia = $data['id_distrito_residencia'];
        $paciente->id_corregimiento_residencia = $data['id_corregimiento_residencia'];
        $paciente->lugar_residencia = $data['lugar_residencia'];     
        $paciente->telefono = $data['telefono'];
        $paciente->celular = $data['celular'];
        $paciente->email = $data['email'];
        $paciente->id_nacionalidad = $data['id_nacionalidad'];
        $paciente->id_tipo_sangre = $data['id_tipo_sanguineo'];
        $paciente->id_raza = $data['id_raza'];
        $paciente->id_etnia = $data['id_etnia'];
        $paciente->diabetes = $data['diabetes'];
        $paciente->fuma = $data['fuma'];
        $paciente->embarazo_trisomia = $data['embarazo_trisomia'];
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

		$datos['paciente'] = $paciente;
       return View::make('datos/pacientes/list-edit-form')->with('datos', $datos);
	}


}
