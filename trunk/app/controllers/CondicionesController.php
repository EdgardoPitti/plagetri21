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
			$datos['marcador_'.$marcador->id.''] = '';
		}
		$datos['form'] = array('route' => 'datos.condiciones.store', 'method' => 'POST');
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
		$enfermedad->status = $data['status'];
		$enfermedad->save();
		
		$id = Enfermedad::all()->last()->id;
		
		for($x=1;$x<Marcador::where('id','>', '0')->count()+1;$x++){
			if($data['marcador_'.$x.''] <> ''){
				$condiciones = new CondicionEnfermedad;
				$condiciones->id_enfermedad = $id;
				$condiciones->id_marcador = $x;
				$condiciones->valor_condicion = $data['marcador_'.$x.''];
				$condiciones->save();
			}
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
		for($x=1;$x<Marcador::where('id','>', '0')->count()+1;$x++){
				$condicion = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first();
				if(empty($condicion)){
					$datos['marcador_'.$x.''] = '';
				}else{
					$datos['marcador_'.$x.''] = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first()->valor_condicion;		
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
		$enfermedad->status = $data['status'];
		$enfermedad->save();
		
		for($x=1;$x<Marcador::where('id','>', '0')->count()+1;$x++){
			$condicion = CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first();
			if(empty($condicion)){
				$condiciones = new CondicionEnfermedad;
			}else{
				$condiciones = CondicionEnfermedad::find(CondicionEnfermedad::where('id_enfermedad', $id)->where('id_marcador', $x)->first()->id);
			} 
			if(empty($data['marcador_'.$x.'']) && !empty($condicion)){
				$condiciones->id_enfermedad = $id;
				$condiciones->id_marcador = $x;
				$condiciones->valor_condicion = $data['marcador_'.$x.''];
				$condiciones->save();	
			}else{
				if(!empty($data['marcador_'.$x.''])){
					$condiciones->id_enfermedad = $id;
					$condiciones->id_marcador = $x;
					$condiciones->valor_condicion = $data['marcador_'.$x.''];
					$condiciones->save();	
				}
			}
			
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
