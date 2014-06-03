<?php
class DropdownController extends BaseController
{
    public function getDistrito()
    {
        $provincia = Input::get('provincia');
        $distrito = Distrito::where('id_provincia',$provincia);
        return ($distrito->get(['id_distrito', 'latitud', 'longitud', 'distrito']));
    }
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
}
