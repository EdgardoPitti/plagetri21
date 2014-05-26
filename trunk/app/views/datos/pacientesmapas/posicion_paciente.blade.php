@extends ('layout')

@section('title')
	Buscar Pacientes en el Mapa
@stop

@section ('content')
	   <h1>
     <div style="position:relative;">
        <div style="position:absolute;left:0px;">
          <a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
        </div>
      </div>
      <center>Reporte por Mapa</center>
    </h1><hr>
     <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_prov', 'Provincia:') }}      
      {{ Form::select('id_prov',  array('0' => 'SELECCIONE PROVINCIA'), null, array('class' => 'form-control id_prov', 'onClick' => 'provincia();')); }}    
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_dist', 'Distrito:') }}
      {{ Form::select('id_dist',  array('0' => 'SELECCIONE DISTRITO'), null, array('class' => 'form-control')); }}
    </div>
     <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_correg', 'Corregimiento:') }}
      {{ Form::select('id_correg',  array('0' => 'SELECCIONE CORREGIMIENTO'), null, array('class' => 'form-control')); }}    
    </div>
  	<center>
  	  <div id="map-canvas"></div>
  	</center>
  
@stop