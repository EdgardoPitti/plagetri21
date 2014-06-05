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
    //Si recibe como id = 0 entonces devolvera todos los pacientes con sus respectivos datos en un arreglo
    //si recibe un numero distinto de 0 entonces devolvera los datos de ese paciente a quien pertenece ese id.
    function datos_pacientes($id)
    {
		if($id == 0){
			$datos = Paciente::all();
		}else{
			$datos[0] = Paciente::find($id);
		}
		$x = 0;
		//Ciclo que recorre todos los pacientes o un paciente en especifico.
		foreach ($datos as $paciente){
			//Decision que reemplaza el booleano de diabetes por palabras.
			if($paciente->diabetes == 1){
				$datos[$x]->diabetes = 'Si';	
			}else{
				$datos[$x]->diabetes = 'No';
			}
			//Decision que reemplaza el booleano de fuma por palabras.
			if($paciente->fuma == 1){
				$datos[$x]->fuma = 'Si';
			}else{
				$datos[$x]->fuma = 'No';
			}
			//Decision que reemplaza el booleano de embarazos anteriores con trisomia por palabras.
			if($paciente->embarazo_trisomia == 1){
				$datos[$x]->embarazos_anteriores = 'Si';
			}else{
				$datos[$x]->embarazos_anteriores = 'No';
			}
			//Decision para comprobar si el paciente tiene una imagen almacenada
			//en caso que no la tenga se le pone la imagen por default.
			if(empty($datos[$x]->foto)){
				$foto = 'default.png';
			}else{
				$foto = $datos[$x]->foto;
			}
			//Sentencias para almacenar los datos del/los paciente(s) en la variable a retornar
			$datos[$x]->foto = $foto;
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
			//Sentencias del calculo de la probablidad por edad
			$probabilidad = 0.000627 + exp(-16.2395) + (0.286 * ($datos[$x]->edad - 0.5));
			$datos[$x]->probabilidad = $probabilidad;
			//Sentencia para el calculo del riesgo
			$datos[$x]->riesgo = $probabilidad / (1 - $probabilidad);

			$x++;	
		}
		return $datos;
    }
}

?>
