<?php

class getmedicosController extends BaseController {
	
	public function postData(){
		$medico = new Medico;

		$medico_id = Input::get('medico');
		
		$datos = $medico->datos_medico($medico_id);
		
		$data = array(
			'foto' => $datos[0]->foto,
			'first_name' => $datos[0]->primer_nombre,
			'second_name' => $datos[0]->segundo_nombre,
			'last_name' => $datos[0]->apellido_paterno,
			'last_sec_name' => $datos[0]->apellido_materno,
			'extension' => $datos[0]->extension,
			'especiality' => $datos[0]->especialidad,
			'level' => $datos[0]->nivel,
			'ubicacion' => $datos[0]->ubicacion,
			'observacion' => $datos[0]->observacion
				
		);
		
		return Response::json($data);
	
	}
}
?>