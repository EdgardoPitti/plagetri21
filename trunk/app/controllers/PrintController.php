<?php
class PrintController extends \BaseController 
{
    public function edit($id)
    {
		//Declarar un arreglo para devolver los resultados.
		$parameter = array();
		//Se instancian los objetos necesarios.
		$paciente = new Paciente;
		$condiciones = new CondicionEnfermedad;
		//Sentencia para crear un objeto para realizar los documentos PDF.
		$pdf = App::make('dompdf');
		
		//Se almacena los datos pertenecientes a la cita.
		$parameter['cita'] = Cita::find($id);
		//Se almacena los datos pertenecientes al pacientes.
		$parameter['datos'] = $paciente->datos_pacientes($parameter['cita']->id_paciente);
		//Se busca la institucion respectiva del ID almacenado en la cita.
		if($parameter['cita']->id_institucion == 0){
			$parameter['institucion'] = new Institucion;
			$parameter['institucion']->denominacion = 'No Definida';
		}else{
			$parameter['institucion'] = Institucion::find($parameter['cita']->id_institucion);
		}
		//Se busca y se almacena al medico perteneciente al ID que se almaceno en la cita.
		if($parameter['cita']->id_medico == 0){
			$parameter['medico'] = new Medico;
			$parameter['medico']->primer_nombre = 'No';
			$parameter['medico']->apellido_paterno = 'Definido';
		}else{
			$parameter['medico'] = Medico::find($parameter['cita']->id_medico);
		}
		
		//Se busca y se almacenan los datos pertenecientes a los marcadores de la cita.
		$parameter['marcadores'] = MarcadorCita::where('id_cita', $id)->where('id_marcador', '<', '5')->where('id_marcador','<>', '3')->get();
		//Se llama a la funcion obtenerEnfermedades que me devuelve un arreglo con las enfermedades que dieron positivo y negativo de la cita
		//correspondiente al ID que le envio.
		$parameter['resultados'] = $condiciones->obtenerEnfermedades($id);
		//Cargo la vista mandandole los respectivos datos correspondientes almacenados en el arreglo $parameter.
		$pdf = PDF::loadView('datos/citas/Print', $parameter);
		//Creo el archivo pdf y lo almaceno utilizando la cedula como el nombre del archivo.
		return $pdf->stream(''.$parameter['datos'][0]->cedula.'.pdf');
    }
}
