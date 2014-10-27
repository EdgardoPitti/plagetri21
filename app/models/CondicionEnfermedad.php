<?php

class CondicionEnfermedad extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	*/
	protected $table = 'condiciones_enfermedades';

	//Funcion que recibe el ID de la cita para luego buscar sus respectivos marcadores y realizar las comparaciones
	//para devolver los resultados de las enfermedades si son positivos o negativos.
	function obtenerEnfermedades($id){
		//Ciclo que recorre todas las enfermedades
		foreach(Enfermedad::where('status', 1)->get() as $enfermedad){
			//Variable usada como switch para detectar enfermedades.
			$sw = 0;
			//Se crea un objeto para poder almacenar la informacion de los resultados.
			$resultado[$enfermedad->id] = new Enfermedad;
			//Almaceno el nombre de la enfermedad en el resultado usando como indice el ID de la enfermedad
			$resultado[$enfermedad->id]->enfermedad = $enfermedad->descripcion;
			//Sentencia para buscar todas las condiciones pertenecientes a una enfermedad especifica
			$condiciones = CondicionEnfermedad::where('id_enfermedad', $enfermedad->id)->get();
			//Ciclo que recorre todas las condiciones
			foreach($condiciones as $condicion){
				//Decision donde se compara el valor obtenido del marcador de la cita
				//con la condicion para ver si son diferentes.
				$positivo = 0;
				if(!empty(MarcadorCita::where('id_cita', $id)->where('id_marcador', $condicion->id_marcador)->first()->positivo)){
					$positivo = MarcadorCita::where('id_cita', $id)->where('id_marcador', $condicion->id_marcador)->first()->positivo;
				}
				if($positivo <> $condicion->valor_condicion){
					//De ser diferentes la variable como switch cambia de valor.
					$sw = 1;
				}
			}
			//Decision que determina el mensaje a imprimir
			//Si la variable Switch es igual a 0 quiere decir que nunca entro en la decision anterior
			//y que los resultados de la cita son iguales a las condiciones y por ende arroja un resultado positivo
			if($sw == 0){
				$resultado[$enfermedad->id]->resultado = 'Tamiz Positivo';				
				$resultado[$enfermedad->id]->mensaje = $enfermedad->mensaje_positivo;
			//De ser falso la condicion osea que el switch tomo el valor de 1 quiere decir que no fueron
			//exactamente los valores de la cita con las condiciones y arroja un resultado negativo
			}else{
				$resultado[$enfermedad->id]->resultado = 'Tamiz Negativo';				
				$resultado[$enfermedad->id]->mensaje = $enfermedad->mensaje_negativo;
			}
		}
		//Devuelve un arreglo con tdas las enfermedades usando como indice el ID de cada enfermedad
		//Con sus respectivo nombe, resulta si fue positivo o negativo y el mensaje correspondiente.
		return $resultado;
	}
}

?>
