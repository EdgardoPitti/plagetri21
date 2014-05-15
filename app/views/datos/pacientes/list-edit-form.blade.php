@extends ('datos/layout')

@section ('title') Pacientes @stop

@section ('content')

<h1>{{ $datos['label'] }} Pacientes</h1>

{{ Form::model($datos['paciente'], $datos['form'] , array('role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('cedula', 'N&uacute;mero de C&eacute;dula') }}
      {{ Form::text('cedula', null, array('placeholder' => 'N&uacute;mero de C&eacute;dula', 'class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('primer_nombre', 'Primer Nombre') }}
      {{ Form::text('primer_nombre', null, array('placeholder' => 'Primer Nombre', 'class' => 'form-control', 'required' => 'required')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('segundo_nombre', 'Segundo Nombre') }}
      {{ Form::text('segundo_nombre', null, array('placeholder' => 'Segundo Nombre', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('apellido_paterno', 'Apellido Paterno') }}
      {{ Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno', 'class' => 'form-control', 'required' => 'required')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('apellido_materno', 'Apellido Materno') }}
      {{ Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento') }}
      {{ Form::date('fecha_nacimiento', $datos['paciente']->fecha_nacimiento, array('class' => 'form-control')) }}
    </div>
    {{--Orden de Datos en los select: Name,arreglo con valores, value, arreglo con la clase de diseño--}}
    <div class="form-group col-md-4">
      {{ Form::label('id_provincia', 'Provincia de Nacimiento:') }}
      {{ Form::select('id_provincia',  array('0' => 'SELECCIONE PROVINCIA') + Provincia::lists('provincia','id_provincia'), $datos['paciente']->id_provincia_nacimiento, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_distrito', 'Distrito de Nacimiento:') }}
      {{ Form::select('id_distrito',  array('0' => 'SELECCIONE DISTRITO') + Distrito::where('id_provincia', '$idprovincia')->lists('distrito', 'id_distrito'), $datos['paciente']->id_distrito_nacimiento, array('class' => 'form-control', 'onchange' => 'changedistrito')); }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_corregimiento', 'Corregimiento de Nacimiento:') }}
      {{ Form::select('id_corregimiento',  array('0' => 'SELECCIONE CORREGIMIENTO'), $datos['paciente']->id_corregimiento_nacimiento, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('lugar_nacimiento', 'Lugar de Nacimiento:') }}
      {{ Form::text('lugar_nacimiento', null, array('placeholder' => 'Lugar de Nacimiento', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('telefono', 'Telefono:') }}
      {{ Form::text('telefono', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('celular', 'Celular:') }}
      {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('email', 'E-Mail:') }}
      {{ Form::text('email', null, array('placeholder' => 'E-Mail', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_nacionalidad', 'Nacionalidad:') }}
      {{ Form::select('id_nacionalidad',  array('0' => 'SELECCIONE LA NACIONALIDAD') + Nacionalidad::lists('nacionalidad', 'id_nacionalidad'), $datos['paciente']->id_nacionalidad, array('class' => 'form-control')); }}    
    </div>    P
    <div class="form-group col-md-4">
      {{ Form::label('id_tipo_sanguineo', 'Tipo de Sangre:') }}
      {{ Form::select('id_tipo_sanguineo',  array('0' => 'SELECCIONE EL TIPO DE SANGRE') + Tiposangre::lists('tipo_sangre', 'id_tipo_sanguineo'), $datos['paciente']->id_tipo_sangre, array('class' => 'form-control')); }}    
    </div>   
    <div class="form-group col-md-4">
      {{ Form::label('id_raza', 'Raza:') }}
      {{ Form::select('id_raza',  array('0' => 'SELECCIONE LA RAZA') + Raza::lists('raza', 'id_razas'), $datos['paciente']->id_raza, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_etnia', 'Etnia:') }}
      {{ Form::select('id_etnia',  array('0' => 'SELECCIONE LA ENTIA') + Etnia::lists('etnia', 'id_etnia'), $datos['paciente']->id_etnia, array('class' => 'form-control')); }}    
    </div>  
    <div class="form-group col-md-4">
      {{ Form::label('diabetes', 'Diabetes:') }}
      {{ Form::label('si', 'Si') }}
      {{ Form::radio('diabetes', 1, $datos['paciente']->diabetes); }}   
      {{ Form::label('no', 'No') }}
      {{ Form::radio('diabetes', 0, $datos['paciente']->diabetes); }}    
    </div> 
  </div>

  {{ Form::button($datos['label'].' Paciente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}<a href="{{ route('datos.pacientes.index') }}" class="btn btn-info">Limpiar Campos</a>
  
{{ Form::close() }}
     <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Lista de Pacientes</h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="B&uacute;squeda" />
          </div>
          <div class="table-responsive">
            <table class="table table-striped" id="dev-table">
              <thead>
              <tr>
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
                    <td>{{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                    <td>{{ $paciente->lugar_nacimiento }}</td>
                    <td>{{ $paciente->fecha_nacimiento }}</td>
                    <td>{{ $paciente->celular }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>
                      <a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
                      <a href="#" data-id="{{ $paciente->id }}"  class="btn btn-danger btn-delete">Eliminar</a>
                    </td>
                </tr>
              @endforeach
              </tbody> 
            </table>
          </div>
        </div>
      </div>
    </div>
  
 
  {{ Form::open(array('route' => array('datos.pacientes.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  {{ Form::close() }}

@stop

@section('script')
    <script type="text/javascript">
       
        jQuery(document).ready(
            function changeprovincia(){
                var idprovincia = $('#id_provincia').val();
                alert("Hola " + idprovincia);
            });
            function changedistrito(){
                var iddistrito = $('#id_distrito').val();
            });
        });    
        
    </script>
@stop