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
		$parameter['marcadores'] = MarcadorCita::where('id_cita', $id)->where('id_marcador', '<', '5')->where('id_marcador','<>', '3' )->get();
		
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
