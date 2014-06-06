<?php

class Datos_MedianaController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		foreach (Marcador::all() as $marcador){
			if(empty(MedianaMarcador::where('id_marcador', $marcador->id)->first()->mediana_marcador)){
				$valor = 0;
			}else{
				$valor = MedianaMarcador::where('id_marcador', $marcador->id)->first()->mediana_marcador;
			}
			$marcadores[$marcador->id] = $valor;
		}
		return View::make('datos/mediana/list-edit-form')->with('marcadores', $marcadores);
	}
	public function getObtenerMediana()
	{
		$id = Input::get('id');
        $mediana = MedianaMarcador::where('id_marcador',$id);
        return ($mediana->get(['mediana_marcador']));
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
