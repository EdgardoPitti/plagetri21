<?php
class DropdownController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
  
    }
    public function getIndex()
    {
        $input = Input::get('option');
        $distrito = Distrito::all();
        return $distrito->get(['id_distrito','distrito']);
    }
    public function getDistrict()
    {    
        $distinput = Input::get('stateoption');
        $state = State::find($distinput);
        $district = $state->district();
        return $district->get(['id','district']);
    }
}
