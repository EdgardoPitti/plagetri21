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
    //Funcion que recibe el id del marcador y devuelve la mediana correspondiente a ese marcador
    public function getMomMarcador()
    {
        $id = Input::get('idmarcador');
        $semana = Input::get('semana');
        $mediana = MedianaMarcador::where('id_marcador', $id)->where('semana', $semana)->where('id_unidad', UnidadMarcador::where('id_marcador', $id)->get()->last()->id_unidad);
        return ($mediana->get(['mediana_marcador']));
    }
    //Funcion que recibe el id de la raza y del marcador y devuelve los coeficientes correspondientes 
    public function getCoeficiente()
    {
        $idmarcador = Input::get('idmarcador');
        $coeficiente = CoeficienteNuevo::where('id_marcador', $idmarcador);
        return ($coeficiente->get(['a', 'b']));
    }
}
