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
		$institucion = Institucion::find($parameter['cita']->id_institucion);
		if(empty($institucion)){
			$parameter['institucion'] = new Institucion;
			$parameter['institucion']->denominacion = 'No Definido';
		}else{
			$parameter['institucion'] = Institucion::find($parameter['cita']->id_institucion);
		}
		//Se busca y se almacena al medico perteneciente al ID que se almaceno en la cita.
		$medico = Medico::find($parameter['cita']->id_medico);
		if(empty($medico)){
			$parameter['medico'] = new Medico;
			$parameter['medico']->primer_nombre = 'No';
			$parameter['medico']->apellido_paterno = 'Definido';
		}else{
			$parameter['medico'] = Medico::find($parameter['cita']->id_medico);
		}
		
		$chart = new GoogChart();
		$riesgoedad = 1/(number_format($parameter['cita']->riesgo, 0, '', ''))*20000;
		if($riesgoedad > 52){
			$coloredad = '#bb0000';
		}elseif($riesgoedad > 40){
			$coloredad = '#d9534f';
		}else{	
			$coloredad = '#00bb00';
		}
		
		$riesgosuero = 53;
		if($riesgosuero > 52){
			$colorsuero = '#bb0000';
		}elseif($riesgosuero > 40){
			$colorsuero = '#f0ad4e';
		}else{	
			$colorsuero = '#00bb00';
		}
		
		
		$dataMultiple = array( 
			'' => array(
				'Riesgos' => 0,
			),
			' ' => array(
				'Riesgos' => 0,
			),
			'1:383' => array(
				'Riesgos' => 52.22,
			),
			'Suero Tamiz' => array(
				'Riesgos' => $riesgosuero,
			),
			'Edad (1:'.number_format($parameter['cita']->riesgo, 0, '', '').')' => array(
				'Riesgos' => $riesgoedad,
			),
			'  ' => array(
				'Riesgos' => 0,
			),
			'   ' => array(
				'Riesgos' => 0,
			),
		);
		$color = array(
			'#ffffff',
			'#ffffff',
			'#428bca',
			$colorsuero,
			$coloredad,
			'#ffffff',
			'#ffffff',
			
		);
		$chart->setChartAttrs( array(
			'type' => 'bar-vertical',
			'title' => 'El Síndrome de Down',
			'data' => $dataMultiple,
			'size' => array( 300, 150 ),
			'color' => $color,
			'labelsXY' => false,
			));
			
		$parameter['chart'] = $chart;
		//Se busca y se almacenan los datos pertenecientes a los marcadores de la cita.
		$parameter['marcadores'] = MarcadorCita::where('id_cita', $id)->where('valor','<>','0')->get();
		//Se llama a la funcion obtenerEnfermedades que me devuelve un arreglo con las enfermedades que dieron positivo y negativo de la cita
		//correspondiente al ID que le envio.
		$parameter['resultados'] = $condiciones->obtenerEnfermedades($id);
		//Cargo la vista mandandole los respectivos datos correspondientes almacenados en el arreglo $parameter.
		$pdf = PDF::loadView('datos/citas/Print', $parameter);
		//Creo el archivo pdf y lo almaceno utilizando la cedula como el nombre del archivo.
		return $pdf->stream(''.$parameter['datos'][0]->cedula.'.pdf', array("Attachment" => false));
    }
}
