<?php

class Datos_ModulosController extends BaseController {

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
		$grupo = new GrupoUsuario;
		$form['datos'] = array('route' => 'datos.grupos.store', 'method' => 'POST');
		$form['grupo'] = $grupo;
		return View::make('datos/modulos/list-edit-form')->with('tipousuario', $grupo)->with('form', $form);
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
		$datos = Input::all();
		$id_grupo = $datos['id_grupo_usuario'];
		foreach (Modulo::all() as $modulo) {
			$modulousuario = ModuloUsuario::where('id_grupo_usuario', $id_grupo)->where('id_modulo', $modulo->id)->first();
			if(!empty($datos['modulo_'.$modulo->id.''])){
				if(empty($modulousuario->id)){
					$modulousuario = new ModuloUsuario;
					$modulousuario->id_modulo = $modulo->id;
					$modulousuario->id_grupo_usuario = $id_grupo;
					$modulousuario->inactivo = 0;
					$modulousuario->save();
				}else{
					if($modulousuario->inactivo == 1){
						$modulousuario->inactivo = 0;
						$modulousuario->save();
					}
				}
			}else{
				if(!empty($modulousuario->id)){
					$modulousuario->inactivo = 1;
					$modulousuario->save();
				}
			}		
		}
		return Redirect::route('datos.modulos.show', $id_grupo);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$grupo = GrupoUsuario::find($id);
		return View::make('datos/modulos/list-edit-form')->with('tipousuario', $grupo);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

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
	}


}
