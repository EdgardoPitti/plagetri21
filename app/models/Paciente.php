<?php

class Paciente extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pacientes';

	//Funcion para calcular la edad de una persona recibiendo como parametro la fecha de nacimiento
	function edad($fecha)
	{
		$fecha_actual = getdate();
        $edad = 0;
        $fecha = explode("-", $fecha);
        if (!checkdate($fecha[1],$fecha[2],$fecha[0])){
                $edad = 'Fecha Inválida';
        }else{
                if($fecha[0] < $fecha_actual['year']){
                        if($fecha[1] < $fecha_actual['mon']){
                                $edad = $fecha_actual['year'] - $fecha[0];
                        }else{
                                $edad = $fecha_actual['year'] - $fecha[0];
                                $edad--;
                        }                              
                }
        }
        return $edad;
    }
    //Funcion que busca los datos de los pacientes
    function datos_pacientes($id)
    {
		if($id == 0){
			$datos = Paciente::all();
		}else{
			$datos[0] = Paciente::find($id);
		}
		$x = 0;
		foreach ($datos as $paciente){

			if($paciente->diabetes == 1){
				$datos[$x]->diabetes = 'Si';	
			}else{
				$datos[$x]->diabetes = 'No';
			}
			if($paciente->fuma == 1){
				$datos[$x]->fuma = 'Si';
			}else{
				$datos[$x]->fuma = 'No';
			}

			$datos[$x]->etnia = Etnia::where('id_etnia', $paciente->id_etnia)->first()->etnia;
			$datos[$x]->raza = Raza::where('id_razas', $paciente->id_raza)->first()->raza;
			$datos[$x]->edad = $this->edad($paciente->fecha_nacimiento);
			$datos[$x]->provincia_nacimiento = Provincia::where('id_provincia', $paciente->id_provincia_nacimiento)->first()->provincia;
			$datos[$x]->distrito_nacimiento = Distrito::where('id_distrito', $paciente->id_distrito_nacimiento)->first()->distrito;
			$datos[$x]->corregimiento_nacimiento = Corregimiento::where('id_corregimiento', $paciente->id_corregimiento_nacimiento)->first()->corregimiento;
			$datos[$x]->provincia_residencia = Provincia::where('id_provincia', $paciente->id_provincia_residencia)->first()->provincia;
			$datos[$x]->distrito_residencia = Distrito::where('id_distrito', $paciente->id_distrito_residencia)->first()->distrito;
			$datos[$x]->corregimiento_residencia = Corregimiento::where('id_corregimiento', $paciente->id_corregimiento_nacimiento)->first()->corregimiento;
			$datos[$x]->nacionalidad = Nacionalidad::where('id_nacionalidad', $paciente->id_nacionalidad)->first()->nacionalidad;
			$datos[$x]->tipo_sangre = Tiposangre::where('id_tipo_sanguineo', $paciente->id_tipo_sangre)->first()->tipo_sangre;

			$x++;	
		}
		return $datos;
    }
}

?>
