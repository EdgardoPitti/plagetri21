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
}
