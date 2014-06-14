<?php

class Mantenimiento extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'mantenimientos';


	function mes($var){
		$fecha_actual = getdate();
		$fecha = $fecha_actual['year'].'-';
		if($fecha_actual['mon'] < 10){
			$fecha.= '0';
		}
		$fecha.= $fecha_actual['mon'].'-'.$var.'1';
		return $fecha;
	}
}

?>