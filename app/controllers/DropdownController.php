<?php
class DropdownController extends BaseController
{
    //Funcion que recibe el id de la provincia y devuelve los distritos correspondientes de esa provincia
    public function getDistrito()
    {
        $provincia = Input::get('provincia');
        $distrito = Distrito::where('id_provincia',$provincia);
        return ($distrito->get(['id_distrito', 'latitud', 'longitud', 'distrito']));
    }
    //Funcion que recibe el id del distrito y devuelve los corregimientos correspondientes de ese distrito
    public function getCorregimiento()
    {    
        $distrito = Input::get('distrito');
        $corregimiento = Corregimiento::where('id_distrito',$distrito);
        return ($corregimiento->get(['id_corregimiento', 'latitud', 'longitud', 'corregimiento']));
    }
    
    public function marcadores(){
        $xml = new DOMDocument("1.0", "UTF-8");

        $node = $xml->createElement("marcadores");
        $parnode = $xml->appendChild($node);
        
        foreach(Provincia::all() as $provincia){
            $node = $xml->createElement('marca');
            $marca = $parnode->appendChild($node);
            $marca->setAttribute("latitud", $provincia->latitud);
            $marca->setAttribute("longitud", $provincia->longitud);
            $marca->setAttribute("provincia", $provincia->provincia);
        }       
        $xml->formatOutput = true;
        $strings = $xml->saveXML();
        $xml->save('assets/marcadores.xml');
        return Redirect::to('datos/pacientesmapas');
    }
    //Funcion que recibe el id del tipo de institucion obligatorio y/o el id de la provincia y devuelve las instituciones correspondientes de esa provincia y tipo
    public function getInstitucion()
    {
        $tipo = Input::get('tipo');
        $provincia = Input::get('provincia');
        $institucion = Institucion::where('id_tipo_institucion', $tipo);
        if(!empty($provincia)){
            $institucion = Institucion::where('id_provincia', $provincia)->where('id_tipo_institucion', $tipo);                   
        }
        return ($institucion->get(['id','denominacion']));
    }
    //Funcion que recibe el id del tipo de institucion y/o el id de la provincia obligatorio y devuelve las instituciones correspondientes de esa provincia y tipo
    public function getInstitucionprovincia()
    {
        $tipo = Input::get('tipo');
        $provincia = Input::get('provincia');
        $institucion = Institucion::where('id_provincia', $provincia);
        if(!empty($tipo)){
            $institucion = Institucion::where('id_provincia', $provincia)->where('id_tipo_institucion', $tipo);                   
        }
        return ($institucion->get(['id','denominacion']));
    }
    //Funcion que recibe el id del marcador y la semana para proceder a buscar los valores correspondientes superior e inferior de ese marcador
    public function getLimites()
    {
        $id = Input::get('idmarcador');
        $semana = Input::get('semana');
        $limites = ValorNormal::where('id_marcador', $id)->where('semana', $semana)->where('id_unidad', UnidadMarcador::where('id_marcador', $id)->get()->last()->id_unidad);
        return ($limites->get(['lim_inferior', 'lim_superior']));
    }
    //Funcion que recibe el id del marcador y devuelve la mediana correspondiente a ese marcador
    public function getMomMarcador()
    {
        $id = Input::get('idmarcador');
        $semana = Input::get('semana');
        if(empty(Configuracion::all()->last()->automatico) OR Configuracion::all()->last()->automatico == 0){
			$mediana = MedianaMarcador::where('id_marcador', $id)->where('semana', $semana)->where('id_unidad', UnidadMarcador::where('id_marcador', $id)->get()->last()->id_unidad);
		}else{
			$mediana = MedianaMarcadorAuto::where('id_marcador', $id)->where('semana', $semana)->where('id_unidad', UnidadMarcador::where('id_marcador', $id)->get()->last()->id_unidad);
		}
        return ($mediana->get(['mediana_marcador']));
    }
    //Funcion que recibe el id de la raza y del marcador y devuelve los coeficientes correspondientes a la funcion lineal
    public function getCoeficienteLineal()
    {
        $idmarcador = Input::get('idmarcador');
        $coeficiente = CoeficienteLineal::where('id_marcador', $idmarcador);
        return ($coeficiente->get(['a', 'b']));
    }
    //Funcion que recibe el id de la raza y del marcador y devuelve los coeficientes correspondientes a la funcion exponencial
    public function getCoeficienteExponencial()
    {
        $idmarcador = Input::get('idmarcador');
        $idraza = Input::get('idraza');
        $coeficiente = CoeficienteExponencial::where('id_marcador', $idmarcador);
        return ($coeficiente->get(['a', 'b']));
    }
    public function getAutoMediana(){
		$idmarcador = Input::get('marcador');
		$semana = Input::get('semana');
		$medianas = MedianaMarcadorAuto::where('id_marcador', $idmarcador)->where('semana', $semana);
		return ($medianas->get(['mediana_marcador', 'id_unidad']));
	}
	public function getValidarCed(){
		$data = Input::all();
		$paciente = Paciente::where('cedula', $data['ced']);
		return ($paciente->get(['cedula']));
	}
	public function getValidarCedM(){
		$data = Input::all();
		$medico = Medico::where('cedula', $data['ced']);
		return ($medico->get(['cedula']));
	}
    public function getCalculoFecha(){
        $tipo = Input::get('tipo');
        $fecha = Input::get('fecha');
        $tiempo = 0;
        if($tipo == 1){
            $tiempo = '+7 days';
        }elseif($tipo == 2){
            $tiempo = '+15 days';
        }elseif($tipo == 3){
            $tiempo = '+1 month';
        }elseif($tipo == 4){
            $tiempo = '+3 month';
        }elseif($tipo == 5){
            $tiempo = '+6 month';
        }elseif($tipo == 6){
            $tiempo = '+12 month';
        }else{
            $tiempo = '';
        }
        $proximo = date('Y-m-d', strtotime("".$fecha." ".$tiempo.""));
        return $proximo;
    }
    public function getObtenerGarantias(){
        if(Request::ajax()){
            $fecha_inicio = Input::get('fecha_inicio');
            $fecha_fin = Input::get('fecha_fin');
            $activos = DB::table('activos')->whereBetween('fecha_garantia', array($fecha_inicio, $fecha_fin))->get();            
            return $activos;            
        }else{
            App::abort(403);
        }
    }
    public function getObtenerActivos(){
        if(Request::ajax()){
            $fecha_inicio = Input::get('fecha_inicio');
            $fecha_fin = Input::get('fecha_fin');
            $activos = DB::table('activos')->whereBetween('fecha_compra', array($fecha_inicio, $fecha_fin))->orderBy('costo', 'desc')->get();            
            return $activos;            
        }else{
            App::abort(403);
        }
    }
    public function getObtenerFallas(){
        if(Request::ajax()){
            $fecha_inicio = Input::get('fecha_inicio');
            $fecha_fin = Input::get('fecha_fin');
            $fallas = DB::select("SELECT a.num_activo, a.nombre, a.modelo, a.serie, a.marca, t.tipo_fuente, count(m.id) AS cantidad FROM mantenimientos m, activos a, tipos_fuentes t WHERE id_tipo_mantenimiento = 2 AND m.id_activo = a.id AND a.id_tipo_fuente = t.id AND fecha_realizacion between '".$fecha_inicio."' AND '".$fecha_fin."' GROUP BY id_activo ORDER BY cantidad desc;");
            return $fallas;            
        }else{
            App::abort(403);
        }
    }
    public function getObtenerPreventivos(){
        if(Request::ajax()){
            $fecha_inicio = Input::get('fecha_inicio');
            $fecha_fin = Input::get('fecha_fin');
            $preventivos = DB::select("SELECT * FROM mantenimiento_preventivo WHERE fecha_realizacion BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'");
            return $preventivos;            
        }else{
            App::abort(403);
        }
    }
    public function getObtenerCorrectivos(){
        if(Request::ajax()){
            $fecha_inicio = Input::get('fecha_inicio');
            $fecha_fin = Input::get('fecha_fin');
            $preventivos = DB::select("SELECT * FROM mantenimiento_correctivo WHERE fecha_realizacion BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'");
            return $preventivos;            
        }else{
            App::abort(403);
        }
    }
}
