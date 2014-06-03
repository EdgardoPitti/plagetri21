@extends ('layout')

@section ('title') Pacientes @stop

@section ('content')
<h1>
 <div style="position:relative;">
    <div style="position:absolute;left:0px;">
      <a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
    </div>
  </div>
  <center>{{ $datos['label'] }} Pacientes</center>
</h1><hr>

{{ Form::model($datos['paciente'][0], $datos['form'] + array('files' => 'true') , array('role' => 'form')) }}
  <div class="row">
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      <center>
        {{ Form::label('foto', 'Foto de Perfil') }}<br>
        {{ Form::image('imgs/'.$datos['paciente'][0]->foto.'', 'foto', array('style' => 'heigth:150px; width:150px;')) }} <br><br>
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" placeholder="Buscar Foto" disabled="disabled">
            <span class="input-group-btn">
                <!-- image-preview-clear button -->
                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
                <!-- image-preview-input -->
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span class="image-preview-input-title"></span>
                    {{ Form::file('foto', array('accept' => 'image/*')) }}
                </div>
            </span>
        </div>   
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('cedula', 'N&uacute;mero de C&eacute;dula') }}
      {{ Form::text('cedula', null, array('placeholder' => 'N&uacute;mero de C&eacute;dula', 'class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('primer_nombre', 'Primer Nombre') }}
      {{ Form::text('primer_nombre', null, array('placeholder' => 'Primer Nombre', 'class' => 'form-control', 'required' => 'required')) }}        
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('segundo_nombre', 'Segundo Nombre') }}
      {{ Form::text('segundo_nombre', null, array('placeholder' => 'Segundo Nombre', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('apellido_paterno', 'Apellido Paterno') }}
      {{ Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno', 'class' => 'form-control', 'required' => 'required')) }}        
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('apellido_materno', 'Apellido Materno') }}
      {{ Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento') }}
      {{ Form::date('fecha_nacimiento', $datos['paciente'][0]->fecha_nacimiento, array('class' => 'form-control', 'min' => '1950-01-01', 'max' => '2020-12-31')) }}
    </div>
    {{--Orden de Datos en los select: Name,arreglo con valores, value, arreglo con la clase de diseño--}}
    {{--Datos de Nacimiento--}}
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_provincia', 'Provincia de Nacimiento:') }}
      {{ Form::select('id_provincia',  array('0' => 'SELECCIONE PROVINCIA') + Provincia::lists('provincia','id_provincia'), $datos['paciente'][0]->id_provincia_nacimiento, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_distrito', 'Distrito de Nacimiento:') }}
      {{ Form::select('id_distrito',  array('0' => 'SELECCIONE DISTRITO') + Distrito::where('id_provincia', $datos['paciente'][0]->id_provincia_nacimiento)->lists('distrito', 'id_distrito'), $datos['paciente'][0]->id_distrito_nacimiento, array('class' => 'form-control')); }}
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_corregimiento', 'Corregimiento de Nacimiento:') }}
      {{ Form::select('id_corregimiento',  array('0' => 'SELECCIONE CORREGIMIENTO') + Corregimiento::where('id_distrito', $datos['paciente'][0]->id_distrito_nacimiento)->lists('corregimiento', 'id_corregimiento'), $datos['paciente'][0]->id_corregimiento_nacimiento, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('lugar_nacimiento', 'Lugar de Nacimiento:') }}
      {{ Form::text('lugar_nacimiento', null, array('placeholder' => 'Lugar de Nacimiento', 'class' => 'form-control')) }}        
    </div>
    {{--Datos de Residencia--}}
   <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_provincia_residencia', 'Provincia de Residencia:') }}
      {{ Form::select('id_provincia_residencia',  array('0' => 'SELECCIONE PROVINCIA') + Provincia::lists('provincia','id_provincia'), $datos['paciente'][0]->id_provincia_residencia, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_distrito_residencia', 'Distrito Residencia:') }}
      {{ Form::select('id_distrito_residencia',  array('0' => 'SELECCIONE DISTRITO') + Distrito::where('id_provincia', $datos['paciente'][0]->id_provincia_residencia)->lists('distrito', 'id_distrito'), $datos['paciente'][0]->id_distrito_residencia, array('class' => 'form-control')); }}
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_corregimiento_residencia', 'Corregimiento de Residencia:') }}
      {{ Form::select('id_corregimiento_residencia',  array('0' => 'SELECCIONE CORREGIMIENTO') + Corregimiento::where('id_distrito', $datos['paciente'][0]->id_distrito_residencia)->lists('corregimiento', 'id_corregimiento'), $datos['paciente'][0]->id_corregimiento_residencia, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('lugar_residencia', 'Lugar de Residencia:') }}
      {{ Form::text('lugar_residencia', null, array('placeholder' => 'Lugar de Residencia', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('telefono', 'Telefono:') }}
      {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('celular', 'Celular:') }}
      {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('email', 'E-Mail:') }}
      {{ Form::text('email', null, array('placeholder' => 'E-Mail', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_nacionalidad', 'Nacionalidad:') }}
      {{ Form::select('id_nacionalidad',  array('0' => 'SELECCIONE LA NACIONALIDAD') + Nacionalidad::lists('nacionalidad', 'id_nacionalidad'), $datos['paciente'][0]->id_nacionalidad, array('class' => 'form-control')); }}    
    </div>   
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_tipo_sanguineo', 'Tipo de Sangre:') }}
      {{ Form::select('id_tipo_sanguineo',  array('0' => 'SELECCIONE EL TIPO DE SANGRE') + Tiposangre::lists('tipo_sangre', 'id_tipo_sanguineo'), $datos['paciente'][0]->id_tipo_sangre, array('class' => 'form-control')); }}    
    </div>   
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_raza', 'Raza:') }}
      {{ Form::select('id_raza',  array('0' => 'SELECCIONE LA RAZA') + Raza::lists('raza', 'id_razas'), $datos['paciente'][0]->id_raza, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('id_etnia', 'Etnia:') }}
      {{ Form::select('id_etnia',  array('0' => 'SELECCIONE LA ENTIA') + Etnia::lists('etnia', 'id_etnia'), $datos['paciente'][0]->id_etnia, array('class' => 'form-control')); }}    
    </div>  
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('diabetes', 'Diabetes:') }}<br>
      {{ Form::label('si', 'Si') }}
      {{ Form::radio('diabetes', 1, $datos['paciente'][0]->diabetes); }}   
      {{ Form::label('no', 'No') }}
      {{ Form::radio('diabetes', 0, $datos['paciente'][0]->diabetes); }}    
    </div> 
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('fuma', 'Fuma:') }}<br>
      {{ Form::label('si', 'Si') }}
      {{ Form::radio('fuma', 1, $datos['paciente'][0]->fuma); }}   
      {{ Form::label('no', 'No') }}
      {{ Form::radio('fuma', 0, $datos['paciente'][0]->fuma); }}    
    </div> 
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
      {{ Form::label('embarazo_trisomia', 'Casos anteriores con Trisomia:') }}<br>
      {{ Form::label('si', 'Si') }}
      {{ Form::radio('embarazo_trisomia', 1, $datos['paciente'][0]->embarazo_trisomia); }}   
      {{ Form::label('no', 'No') }}
      {{ Form::radio('embarazo_trisomia', 0, $datos['paciente'][0]->embarazo_trisomia); }}    
    </div> 
  </div>
  <div class="form-group col-sm-12 col-md-12 col-lg-12">
    <center>
      {{ Form::button($datos['label'].' Paciente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
      <a href="{{ route('datos.pacientes.index') }}" class="btn btn-info">Limpiar Campos</a>
    </center>
  </div>
{{ Form::close() }}

     <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Lista de Pacientes</h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Buscar Paciente" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Pacientes" /><br>
            <div class="overthrow"  style="overflow:auto;width:100%;">
              <table class="table table-bordered table-hover" id="dev-table">
                <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Lugar de Nacimiento</th>
                    <th>Fecha Nacimiento</th>
                    <th>Celular</th>
                    <th>Telefono</th>
                    <th>E-Mail</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                {{--*/ $x = 1; /*--}}
                @foreach (Paciente::all() as $paciente)
                  <tr>
                      <td>{{ $x++ }}.</td>
                      <td>{{ $paciente->primer_nombre.' '.$paciente->segundo_nombre.' '.$paciente->apellido_paterno.' '.$paciente->apellido_materno }}</td>
                      <td>{{ $paciente->lugar_nacimiento }}</td>
                      <td>{{ $paciente->fecha_nacimiento }}</td>
                      <td>{{ $paciente->celular }}</td>
                      <td>{{ $paciente->telefono }}</td>
                      <td>{{ $paciente->email }}</td>
                      <td align="center">
                          <a href="{{ route('datos.citas.show', $paciente->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"  title="Crear Cita"><span class="glyphicon glyphicon-list-alt"></span></a>                         
                          <a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary btn-sm" style="margin:3px 0px;" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>                         
                          <a href="#" data-id="{{ $paciente->id }}"  class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>                                            
                      </td>
                  </tr>
                @endforeach
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  
 
  {{ Form::open(array('route' => array('datos.pacientes.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  {{ Form::close() }}
  
  {{ HTML::script('assets/js/overthrow/overthrow-detect.js') }}
  {{ HTML::script('assets/js/overthrow/overthrow-init.js') }}
  {{ HTML::script('assets/js/overthrow/overthrow-polyfill.js') }}
  {{ HTML::script('assets/js/overthrow/overthrow-toss.js') }}
@stop