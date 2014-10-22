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
		$datos['enfermedad'] = new Enfermedad;
		foreach(Marcador::all() as $marcador){
			$datos['marcador_'.$marcador->id.''] = 0;
		}
		$datos['form'] = array('route' => 'datos.condiciones.store', 'method' => 'post');
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
		$data = Input::all();
		$enfermedad = new Enfermedad;
		
		
		$enfermedad->descripcion = $data['descripcion'];
		$enfermedad->mensaje_positivo = $data['mensaje_positivo'];
		$enfermedad->mensaje_negativo = $data['mensaje_negativo'];
		$enfermedad->save();
		
		$id = Enfermedad::all()->last()->id;
		
		foreach(Marcador::all() as $marcador){
			$condiciones = new CondicionEnfermedad;
			$condiciones->id_enfermedad = $id;
			$condiciones->id_marcador = $marcador->id;
			$condiciones->valor_condicion = $data['marcador_'.$marcador->id.''];
			$condiciones->save();
		}
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
		$datos['enfermedad'] = Enfermedad::find($id);
		$datos['form'] = array('route' => array('datos.condiciones.update', $id), 'method' => 'PATCH');
		foreach(Marcador::all() as $marcador){
				if(empty(CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $marcador->id)->first())){
					$datos['marcador_'.$marcador->id.''] = 0;
				}else{
					$datos['marcador_'.$marcador->id.''] = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $marcador->id)->first()->valor_condicion;		
				}
		}
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
		$data = Input::all();
		$enfermedad = Enfermedad::find($id);
		
		
		$enfermedad->descripcion = $data['descripcion'];
		$enfermedad->mensaje_positivo = $data['mensaje_positivo'];
		$enfermedad->mensaje_negativo = $data['mensaje_negativo'];
		$enfermedad->save();
		
		foreach(Marcador::all() as $marcador){
			if(empty(CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $marcador->id)->first())){
				$condiciones = new CondicionEnfermedad;
			}else{
				$condiciones = CondicionEnfermedad::find(CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $marcador->id)->first()->id);
			}
			$condiciones->id_enfermedad = $id;
			$condiciones->id_marcador = $marcador->id;
			$condiciones->valor_condicion = $data['marcador_'.$marcador->id.''];
			$condiciones->save();
		}
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
