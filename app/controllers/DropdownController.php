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
        $tipo_institucion = Input::get('datos2');
        $institucion = Institucion::where('id_tipo_institucion', $tipo_institucion);
        return ($institucion->get(['id','denominacion']));
    }
    public function getInstitucionprovincia()
    {
        $provincia = Input::get('datos1');
        $institucion = Institucion::where('id_provincia', $provincia);
        return ($institucion->get(['id','denominacion']));
    }
}
