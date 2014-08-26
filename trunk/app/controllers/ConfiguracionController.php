<?php

class ConfiguracionController extends BaseController {

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
		$unidadmarcador = new UnidadMarcador;
		$unidadmarcador->id_marcador = 0;
		return View::make('datos/configuracion/list-edit-form')->with('unidadmarcador', $unidadmarcador);
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
		if($data['control'] == 1){
			$unidadmarcador = new UnidadMarcador;
			$unidadmarcador->id_marcador = $data['id_marcador'];
			$unidadmarcador->id_unidad = $data['id_unidad'];
			$unidadmarcador->id_usuario = Auth::user()->id;
			$unidadmarcador->save();
		}else{
			if(empty($data['automatico'])){
				$data['automatico'] = 0;
				$data['registros'] = 0;
			}
			$configuracion = new Configuracion;
			$configuracion->id_usuario = Auth::user()->id;
			$configuracion->automatico = $data['automatico'];
			$configuracion->cantidad_registros = $data['registros'];
			$configuracion->save();
			$id = Configuracion::all()->last()->id;
			if($data['automatico'] == 1){
				foreach(Marcador::all() as $marcador){
					$detalleconfiguracion = new DetalleConfiguracion;
					$detalleconfiguracion->id_configuracion = $id;
					$detalleconfiguracion->id_marcador = $marcador->id;
					$detalleconfiguracion->id_unidad = UnidadMarcador::where('id_marcador', $marcador->id)->get()->last()->id_unidad;
					$detalleconfiguracion->save();				
				}
			}
		}
		$unidadmarcador = new UnidadMarcador;
		$unidadmarcador->id_marcador = 0;
		return View::make('datos/configuracion/list-edit-form')->with('unidadmarcador', $unidadmarcador);
		
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
		$unidadmarcador = UnidadMarcador::where('id_marcador', $id)->get()->last();
		if(empty($unidadmarcador->id)){
			$unidadmarcador = new UnidadMarcador;
		}
		$unidadmarcador->id_marcador = $id;
		return View::make('datos/configuracion/list-edit-form')->with('unidadmarcador', $unidadmarcador);
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
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
