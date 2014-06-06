<?php

class MedianaMarcador extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'mediana_marcadores';

	function  obtenerMediana($id){
		$valor = MedianaMarcador::where('id_marcador', $id)->first();
		if(is_null($valor)){
			$valor = new MedianaMarcador;
			$valor->mediana_marcador = 0;
		}
		return $valor;
	}
}

?>