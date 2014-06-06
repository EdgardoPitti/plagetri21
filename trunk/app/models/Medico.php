<?php

class Medico extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'medicos';

	function datos_medico($id){
		if($id == 0){
			$datos = Medico::all();
		}else{
			$datos[0] = Medico::find($id);
		}
		$x = 0;
		foreach($datos as $medico){			
			if(empty($datos[$x]->foto)){
				$foto = "default1.png";				
			}else{
				$foto = $datos[$x]->foto;
			}
			$datos[$x]->foto = $foto;
			$datos[$x]->especialidad = $medico->id_especialidades_medicas;			
		}
		return $datos;
	}
}
