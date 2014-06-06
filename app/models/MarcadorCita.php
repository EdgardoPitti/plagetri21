<?php

class MarcadorCita extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'marcadores_citas';

	function obtenerMarcador($id, $id_cita){
		$marcadorcita = MarcadorCita::where('id_marcador', $id)->where('id_cita', $id_cita)->first();
		if(empty($marcadorcita)){
			$marcadorcita = new MarcadorCita;
		}
		return $marcadorcita;
	}

}

?>
