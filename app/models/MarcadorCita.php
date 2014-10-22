<?php
/* Esta tabla almacena los valores correspondientes a los marcadores respectivos de una paciente
 * llenado en una cita.
 * 1- id
 * 2- id_cita
 * 3- id_marcador
 * 4- id_metodologia
 * 5- id_unidad
 * 6- valor
 * 7- mom
 * 8- corr_peso_exponencial
 * 9- corr_peso_lineal
 * 10- positivo
 */
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
