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
			$datos[$x]->especialidad = EspecialidadMedica::where('id_especialidades_medicas', $medico->id_especialidades_medicas)->first()->descripcion;	
			if(!empty($medico->id_nivel)){
				$datos[$x]->nivel =  Nivel::where('id', $medico->id_nivel)->first()->nivel;
			}else{
				$datos[$x]->nivel =  'POR DEFINIR';
			}
			if(!empty($medico->id_ubicacion)){
				$datos[$x]->ubicacion = Ubicacion::where('id', $medico->id_ubicacion)->first()->ubicacion;
			}else{
				$datos[$x]->ubicacion = 'POR DEFINIR';			
			}
			
		}
		return $datos;
	}
}
