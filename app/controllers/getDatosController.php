<?php

class getDatosController extends BaseController {
	
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
	//Funcion para obtener todos los médicos y filtrarlos con su respectiva paginacion.
	public function postMedicos(){
		$medico = new Medico;
		    	
		//variables recibidas por el script bootstrap-table
		$search = Input::get('search'); //utilizada para buscar un médico en la base de datos
		$limit = Input::get('limit'); 
		$offset = Input::get('offset');
		
		$n = 1;
		//Si recibe la variable "search" vacía, obtiene todos los médicos, sino busca alguno en específico.
		//variable cantidad: sirve para conocer el total de registros y realizar la paginación de acuerdo al limit y offset.
		if(empty($search)){
			$datos = $medico->datos_medico(0, 0, $limit, $offset);
			$cantidad = Medico::all()->count();		
		}else{
			//Obtiene todos los datos de los médicos que se buscan en la función "datos_medico" del modelo "medico"
			$datos = $medico->datos_medico($search, 1, $limit, $offset);				
			//Funcion que recibe cuantos registros se obtienen al realizar la búsqueda.
			$c = DB::select("SELECT count(id) as cantidad FROM medicos WHERE concat(`primer_nombre`,' ',`segundo_nombre`,' ',`apellido_paterno`,' ',`apellido_materno`) LIKE '%".$search."%'");
			$cantidad = $c[0]->cantidad;			
		}
		$host = $_SERVER['HTTP_HOST'];		
		
		$comilla = "'";
		
		//variable que retorna en formato json	
		$data = '{
						"total": '.$cantidad.',
						"rows": [						
						';
			//ciclo para obtener todos los datos del médico y guardarlos en la variable "data"
			foreach($datos as $datos_medicos[0]){
				$num = $n + $offset;				
				if($n > 1){
					$data.= ',';
				}
				
				$n++;
				$data.='{
				
					"num": '.$num.',
					"foto": "<img src='.$comilla.'http://'.$host.'/plagetri21/public/imgs/'.$datos_medicos[0]->foto.''.$comilla.' style='.$comilla.'width:50px;height:50px;'.$comilla.'>",
					"name": "'.$datos_medicos[0]->primer_nombre.' '.$datos_medicos[0]->segundo_nombre.' '.$datos_medicos[0]->apellido_paterno.' '.$datos_medicos[0]->apellido_materno.'",
					"ext": "'.$datos_medicos[0]->extension.'",
					"tel": "'.$datos_medicos[0]->telefono.'",
					"cel": "'.$datos_medicos[0]->celular.'",
					"esp": "'.$datos_medicos[0]->especialidad.'",
					"url": "<a href='.$comilla.'http://'.$host.'/plagetri21/public/datos/medicos/'.$datos_medicos[0]->id.'/edit'.$comilla.' class='.$comilla.'btn btn-primary btn-sm'.$comilla.' data-toggle='.$comilla.'tooltip'.$comilla.'  title='.$comilla.'Editar M&eacute;dico'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-pencil'.$comilla.'></span> Editar </a> <a href='.$comilla.'#Show'.$comilla.' id='.$comilla.''.$datos_medicos[0]->id.''.$comilla.' onclick='.$comilla.'show('.$datos_medicos[0]->id.');'.$comilla.'  class='.$comilla.'btn btn-success btn-sm ver'.$comilla.' data-toggle='.$comilla.'modal'.$comilla.'  title='.$comilla.'Ver Médico'.$comilla.' style='.$comilla.'margin:3px 0px;'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-eye-open'.$comilla.'></span> Ver </a>"
					}';
			}				
			
		$data .= ']
			}';
		return $data;
			
	}
	//Funcion que recibe como parametro cita, si el valor de cita es 0, mostrara el boton de eliminar paciente,
	//sino no lo mostrará
	public function postPacientes($cita){
		$paciente = new Paciente;
		
		$search = Input::get('search');
		$limit = Input::get('limit');
		$offset = Input::get('offset');
		
		if(empty($search)){
			$datos = $paciente->datos_pacientes(0, 0, $limit, $offset);			
			$cantidad = Paciente::all()->count();				
		}else {
			$datos = $paciente->datos_pacientes($search, 1, $limit, $offset);
			$c = DB::select("SELECT count(id) as cantidad FROM pacientes WHERE concat(`primer_nombre`,' ',`segundo_nombre`,' ',`apellido_paterno`,' ',`apellido_materno`) LIKE '%".$search."%'");
			$cantidad = $c[0]->cantidad;
		}	
		$host = $_SERVER['HTTP_HOST'];
		
		$comilla = "'";
		$n = 1;
		
		$data = '{
						"total": '.$cantidad.',
						"rows": [						
						';
						
			foreach($datos as $datos_pacientes[0]){
				$num = $n + $offset;
				if($n > 1){
					$data.= ',';
				}
				$n++;
				$data.='{
				
					"num": '.$num.',
					"name": "'.$datos_pacientes[0]->primer_nombre.' '.$datos_pacientes[0]->segundo_nombre.' '.$datos_pacientes[0]->apellido_paterno.' '.$datos_pacientes[0]->apellido_materno.'",
					"date": "'.$datos_pacientes[0]->fecha_nacimiento.'",
					"cel": "'.$datos_pacientes[0]->celular.'",
					"tel": "'.$datos_pacientes[0]->telefono.'",
					"email": "'.$datos_pacientes[0]->email.'",';
					if($cita == 0) {
						$data .=	'"url": "<a href='.$comilla.'http://'.$host.'/plagetri21/public/datos/citas/'.$datos_pacientes[0]->id.''.$comilla.' class='.$comilla.'btn btn-primary btn-sm'.$comilla.' data-toggle='.$comilla.'tooltip'.$comilla.'  title='.$comilla.'Crear Cita'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-list-alt'.$comilla.'></span> Crear Cita </a>  <a href='.$comilla.'http://'.$host.'/plagetri21/public/datos/pacientes/'.$datos_pacientes[0]->id.'/edit'.$comilla.' class='.$comilla.'btn btn-primary btn-sm'.$comilla.' data-toggle='.$comilla.'tooltip'.$comilla.'  title='.$comilla.'Editar Paciente'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-pencil'.$comilla.'></span> Editar </a> <a href='.$comilla.'#'.$comilla.' data-id='.$comilla.''.$datos_pacientes[0]->id.''.$comilla.'  class='.$comilla.'btn btn-danger btn-delete btn-sm'.$comilla.' data-toggle='.$comilla.'tooltip'.$comilla.' title='.$comilla.'Eliminar'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-remove'.$comilla.'></span> Eliminar </a>"';
					}else{
						$data .= '"url": "<a href='.$comilla.'http://'.$host.'/plagetri21/public/datos/citas/'.$datos_pacientes[0]->id.''.$comilla.' class='.$comilla.'btn btn-primary btn-sm'.$comilla.' data-toggle='.$comilla.'tooltip'.$comilla.'  title='.$comilla.'Crear Cita'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-list-alt'.$comilla.'></span> Crear Cita </a>  <a href='.$comilla.'http://'.$host.'/plagetri21/public/datos/pacientes/'.$datos_pacientes[0]->id.'/edit'.$comilla.' class='.$comilla.'btn btn-primary btn-sm'.$comilla.' data-toggle='.$comilla.'tooltip'.$comilla.'  title='.$comilla.'Editar Paciente'.$comilla.'><span class='.$comilla.'glyphicon glyphicon-pencil'.$comilla.'></span> Editar Paciente </a>"';											
					}
				$data .='
					}';
			}				
			
		$data .= ']
			}';
		return $data;
	}
}
?>
