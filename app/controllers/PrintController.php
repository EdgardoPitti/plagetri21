<?php
class PrintController extends \BaseController 
{
    public function edit($id)
    {
		$parameter = array();
		$paciente = new Paciente;
		$pdf = App::make('dompdf');
		
		$parameter['cita'] = Cita::find($id);
		$parameter['datos'] = $paciente->datos_pacientes($parameter['cita']->id_paciente);
		$parameter['institucion'] = Institucion::find($parameter['cita']->id_institucion);
		$parameter['medico'] = Medico::find($parameter['cita']->id_medico);
		$parameter['marcadores'] = MarcadorCita::where('id_cita', $id)->where('id_marcador', '<', '5')->where('id_marcador','<>', '3')->get();
		$parameter['sindromedown'] = 'El riesgo del síndrome de Down es MENOR que el del corte de sondeo. El exámen de suero ha indicado
									  un riesgo sustancialmente REDUCIDO en comparación al de aquel basado en la edad materna solamente.
									';
		$parameter['tamizdown'] = '<b>Tamiz Negativo</b>';
		$pdf = PDF::loadView('datos/citas/Print', $parameter);
		return $pdf->stream(''.$parameter['datos'][0]->cedula.'.pdf');
    }
   	public function show($id)
	{
		$paciente = new Paciente;
		$pdf = App::make('dompdf');
		$pacientes = $paciente->datos_pacientes(0);
		$pdf = PDF::loadView('datos/citas/Print', $pacientes);
		return $pdf->stream();
		
	}

}
