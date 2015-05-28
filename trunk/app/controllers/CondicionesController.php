<?php

class CondicionesController extends BaseController {

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
		
		//Creacion del Objeto para enviar los parametros a la vista
		$datos['enfermedad'] = new Enfermedad;
		//Ciclo que recorre todo los marcadores para almacenar en las variables de cada marcador el valor
		foreach(Marcador::all() as $marcador){
			$datos['marcador_'.$marcador->id.''] = '';
		}
		//Variable que almacena los datos para el formulario
		$datos['form'] = array('route' => 'datos.condiciones.store', 'method' => 'POST');
		//Retorno hacia la vista
		return View::make('datos/condiciones/list-edit-form')->with('datos', $datos);
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
		//Se almacena los datos que provienen del formulario en la variable data
		$data = Input::all();
		//Se crea el objeto para almacenar los datos
		$enfermedad = new Enfermedad;
		//Se almacenan los datos en los campos correspondientes
		$enfermedad->descripcion = $data['descripcion'];
		$enfermedad->mensaje_positivo = $data['mensaje_positivo'];
		$enfermedad->mensaje_negativo = $data['mensaje_negativo'];
		$enfermedad->status = $data['status'];
		$enfermedad->save();
		
		//Se obtiene el id de la ultima enfermedad almacenada
		$id = Enfermedad::all()->last()->id;
		
		//Ciclo que recorre todo los marcadores		
		for($x=1;$x<Marcador::where('id','>', '0')->count()+1;$x++){
			//Se pregunta si el marcador que viene del formulario no esta en blanco para poder almacenarlo
			if($data['marcador_'.$x.''] <> ''){
				//Se crea el objeto para almacenar los datos
				$condiciones = new CondicionEnfermedad;
				//Se coloca los valores respectivos en cada campos
				$condiciones->id_enfermedad = $id;
				$condiciones->id_marcador = $x;
				$condiciones->valor_condicion = $data['marcador_'.$x.''];
				$condiciones->save();
			}
		}
		//Se retorna a la vista 
		return Redirect::route('datos.condiciones.index');
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
		//Se crea el objeto de la enfermedad buscandola por el id recibido
		$datos['enfermedad'] = Enfermedad::find($id);
		//Se almacena los valores necesarios del formulario para poder editar las enfermedades
		$datos['form'] = array('route' => array('datos.condiciones.update', $id), 'method' => 'PATCH');
		//Ciclo que recorre todos los marcadores para buscar la condicion de ese marcador para esa enfermedad
		for($x=1;$x<Marcador::where('id','>', '0')->count()+1;$x++){
				//Se busca la condicion perteneciente a esa enfermedad y ese marcador
				$condicion = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first();
				//En caso de que no tenga se devuelve el valor nulo y si tiene se devuelve el valor correspondiente
				if(empty($condicion)){
					$datos['marcador_'.$x.''] = '';
				}else{
					$datos['marcador_'.$x.''] = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first()->valor_condicion;		
				}
		}
		//Retorno a la vista con los datos correspondientes
		return View::make('datos/condiciones/list-edit-form')->with('datos', $datos);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{		
		//Se almacena en la variable data los valores de los campos recibidos del formularios
		$data = Input::all();
		//Se busca la enfermedad por el id recibido para poder editarla
		$enfermedad = Enfermedad::find($id);
	
		//Se coloca los valores recibidos del fomrulario para almacenarlo en cada campo correspondiente
		$enfermedad->descripcion = $data['descripcion'];
		$enfermedad->mensaje_positivo = $data['mensaje_positivo'];
		$enfermedad->mensaje_negativo = $data['mensaje_negativo'];
		$enfermedad->status = $data['status'];
		$enfermedad->save();
		
		//Ciclo que recorre los marcadores con los valores recibidos del formulario
		for($x=1;$x<Marcador::where('id','>', '0')->count()+1;$x++){
			//Variable que almacena el objeto de la condicion perteneciente a esa enfermedad y ese marcador
			$condicion = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first();
			//En caso de que este en blanco la variable quiere decir que la condicion no existe y se crea un nuevo objeto para almacenarla
			if(empty($condicion)){
				$condicion = new CondicionEnfermedad;
			}
			//Si el valor recibido del formulario viene en blanco y la condicion exista en la base de datos se procede a editar el valor
			if(empty($data['marcador_'.$x.'']) && !empty($condicion)){
				CondicionEnfermedad::destroy($condicion->id);		
			}else{
				//En caso de que no cumpla con una de las condiciones anteriores se procede a preguntar si el valor que viene
				//del formulario no esta en blanco para poder editarlo o almacenarlo
				if(!empty($data['marcador_'.$x.''])){
					//Se procede a colocar los datos correspondientes en cada campo
					$condicion->id_enfermedad = $id;
					$condicion->id_marcador = $x;
					$condicion->valor_condicion = $data['marcador_'.$x.''];
					$condicion->save();	
				}
			}
			
		}
		//Se retorna a la vista
		return Redirect::route('datos.condiciones.index');	
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}


}
