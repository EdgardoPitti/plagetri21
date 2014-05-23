<?php
class DropdownController extends BaseController
{
    public function getDistrito()
    {
        $provincia = Input::get('provincia');
        $distrito = Distrito::where('id_provincia',$provincia);
        return ($distrito->get(['id_distrito','distrito']));
    }
    public function getCorregimiento()
    {    
        $distrito = Input::get('distrito');
        $corregimiento = Corregimiento::where('id_distrito',$distrito);
        return ($corregimiento->get(['id_corregimiento','corregimiento']));
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
