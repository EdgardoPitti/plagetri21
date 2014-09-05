<?php

class Datos_CitasController extends BaseController {

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
		$paciente = new Paciente;
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
		$citas->fecha_flebotomia = $data['fecha_flebotomia'];
		$citas->fecha_cita = $data['fecha_cita'];
		$citas->edad_gestacional = $data['edad_gestacional'];
		$citas->observaciones = $data['observaciones'];
		$citas->estatura = $data['estatura'];
		$citas->id_institucion = $data['id_institucion'];
		$citas->hijos_embarazo = $data['hijos_embarazo'];
		$citas->riesgo = $data['riesgo'];
		$citas->riesgo_fap = $data['riesgo_fap'];
		$citas->save();
		$id_cita = Cita::all()->last()->id;
		//Decisiones para almacenar las metodologias de cada marcador
		$met_general = $data['met_general'];
		//Ciclo que recorre todo los marcadores y busca los valores de cada uno para almacenarlos respectivamente.
		foreach(Marcador::all() as $marcador){
			$marcadorcita = new MarcadorCita;
			$valormarcador = new ValorMarcador;
			$marcadorcita->id_cita = $id_cita;
			$marcadorcita->id_marcador = $marcador->id;
			//Se comprueba si no se eligio un marcador para esa metodologia y se le asigna el que selecciono general
			if($data['metodo_'.$marcador->id] == 0){
				$marcadorcita->id_metodologia = $met_general;
			}else{
				$marcadorcita->id_metodologia = $data['metodo_'.$marcador->id.''];
				$valormarcador->id_metodologia = $data['metodo_'.$marcador->id.''];
			}
			$marcadorcita->id_unidad = UnidadMarcador::where('id_marcador', $marcador->id)->get()->last()->id_unidad;
			$marcadorcita->valor = $data['valor_'.$marcador->id.''];
			$marcadorcita->mom = $data['mom_'.$marcador->id.''];
			$marcadorcita->corr_peso_lineal = $data['corr_lineal_'.$marcador->id.''];
			$marcadorcita->corr_peso_exponencial = $data['corr_exp_'.$marcador->id.''];
			$marcadorcita->save();
			
			$valormarcador->id_marcador = $marcador->id;
			$valormarcador->semana = $data['semana'];
			$valormarcador->id_metodologia = $met_general;
			$valormarcador->id_unidad = UnidadMarcador::where('id_marcador', $marcador->id)->get()->last()->id_unidad;
			$valormarcador->valor = $data['valor_'.$marcador->id.''];
			$valormarcador->positivo = $data['positivo_'.$marcador->id.''];
			$valormarcador->id_institucion = $data['id_institucion'];
			$valormarcador->save();
		}
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
		$form['citas']->riesgo = 100;
		$marcadorcita = new MarcadorCita;
		foreach (Marcador::all() as $marcador){
			$form['marcador_'.$marcador->id.''] = new MarcadorCita;
			$form['marcador_cita'] = $marcadorcita;
			$form['marcador_'.$marcador->id.'']->mom = '0.00000';
			$form['marcador_'.$marcador->id.'']->corr_peso_lineal = '0.00000';
			$form['marcador_'.$marcador->id.'']->corr_peso_exponencial = '0.00000';
			
		}
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
		$paciente = new Paciente;
		$cita = Cita::find($id);
		$institucion = Institucion::find($cita->id_institucion);
		if(! empty($institucion)){
			$cita->id_provincia = $institucion->id_provincia;
			$cita->id_tipo = $institucion->id_tipo_institucion;
		}else{
			$cita->id_provincia = '0';
			$cita->id_tipo = '0';
		}
		$datos = $paciente->datos_pacientes(0);
		$dato_paciente = $paciente->datos_pacientes($cita->id_paciente);
		$form['datos'] = array('route' => array('datos.citas.update', $id), 'method' => 'PATCH');
		$form['label'] = 'Editar';
		$form['citas'] =  $cita;
		$marcadorcita = new MarcadorCita;
		//Ciclo que recorre todos los marcadores y los busca para devolver los datos correspondientes
		foreach(Marcador::all() as $marcador){
			$form['marcador_'.$marcador->id.''] = $marcadorcita->obtenerMarcador($marcador->id, $id);
			$form['marcador_cita'] = $marcadorcita;
		}
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
		$data = Input::all();
		$citas = Cita::find($id);
		//sino encuentra una cita crea un nuevo objeto
		if (is_null ($citas))
		{
		 	$citas = new Cita;
		}
		//Sentencias para almacenar los datos correspondientes de la cita
		$citas->id_medico = $data['id_medico'];
		$citas->peso = $data['peso'];
		$citas->fecha_ultrasonido = $data['fecha_ultrasonido'];
		$citas->fur = $data['fur'];
		$citas->fpp = $data['fpp'];
		$citas->fecha_flebotomia = $data['fecha_flebotomia'];
		$citas->fecha_cita = $data['fecha_cita'];
		$citas->edad_gestacional = $data['edad_gestacional'];
		$citas->observaciones = $data['observaciones'];
		$citas->estatura = $data['estatura'];
		$citas->id_institucion = $data['id_institucion'];
		$citas->hijos_embarazo = $data['hijos_embarazo'];
		$citas->riesgo = $data['riesgo'];
		$citas->riesgo_fap = $data['riesgo_fap'];
		$citas->save();
		//Se almacena en una variable el id de la metodologia que eleigio en general.
		$met_general = $data['met_general'];
		//Ciclo para recorrer todos los marcadores
		foreach (Marcador::all() as $marcador){		
			$marcador_cita = new MarcadorCita;
			$marcadorcita = $marcador_cita->obtenerMarcador($marcador->id, $id);
			$marcadorcita->id_cita = $id;
			$marcadorcita->id_marcador = $marcador->id;
			$marcadorcita->valor = $data['valor_'.$marcador->id.''];
			$marcadorcita->mom = $data['mom_'.$marcador->id.''];
			$marcadorcita->corr_peso_lineal = $data['corr_lineal_'.$marcador->id.''];
			$marcadorcita->corr_peso_exponencial = $data['corr_exp_'.$marcador->id.''];
			//Si la metodologia es distinta de 0 quiere decir que se eligio una para ese marcador
			if($data['metodo_'.$marcador->id.''] <> 0){
				//Se almacena la metodologia correspondiente
				$marcadorcita->id_metodologia = $data['metodo_'.$marcador->id.''];	
			}else{
				//Sino entonces se almacena el metodo que se eligio como general.
				$marcadorcita->id_metodologia = $met_general;
			}
			$marcadorcita->save();
		}
		return Redirect::route('datos.citas.show', $data['id_paciente']);	
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
