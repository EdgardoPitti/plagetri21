<?php

class Datos_MedianaController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mediana = new MedianaMarcador;
		foreach (Marcador::all() as $marcador){
			$marcadores[$marcador->id] = $mediana->obtenerMediana($marcador->id);
		}
		return View::make('datos/mediana/list-edit-form')->with('marcadores', $marcadores);
	}
	public function getObtenerMediana()
	{
		$id = Input::get('id');
        $mediana = MedianaMarcador::where('id_marcador',$id);
        if(empty($mediana)){
        	$mediana = new MedianaMarcador;
        	$mediana->mediana_marcador = 0;
        }
        return ($mediana->get(['mediana_marcador']));
	}

	public function getSalvarMediana()
	{
		$id = Input::get('id');
		$valor = Input::get('valor');
		$mediana = MedianaMarcador::where('id_marcador', $id);
		if(empty($mediana)){
			$mediana = new MedianaMarcador;
			$mediana->id_marcador = $id;
		}
		$mediana->mediana_marcador = $valor;
		$mediana->save();
		$mediana = MedianaMarcador::where('id_marcador', $id);
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
