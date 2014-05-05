@extends ('datos/layout')

@section ('title') Crear Pacientes @stop

@section ('content')

{{--*/
    if($paciente->exists){
      $datos_formulario =  array('route' => array('datos.pacientes.update', $paciente->id), 'method' => 'PATCH');
      $tipo = 'Editar';
    }
    else{

      $datos_formulario = array('route' => 'datos.pacientes.store', 'method' => 'POST');
      $tipo = 'Crear';
    }
  /*--}}

<h1>{{ $tipo }} Pacientes</h1>

  <p> 
    <a href="{{ route('datos.pacientes.index') }}" class="btn btn-info">Lista de Pacientes</a>
  </p>

{{ Form::model($paciente, $datos_formulario , array('role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('cedula', 'N&uacute;mero de C&eacute;dula') }}
      {{ Form::text('cedula', null, array('placeholder' => 'N&uacute;mero de C&eacute;dula', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('primer_nombre', 'Primer Nombre') }}
      {{ Form::text('primer_nombre', null, array('placeholder' => 'Primer Nombre', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('segundo_nombre', 'Segundo Nombre') }}
      {{ Form::text('segundo_nombre', null, array('placeholder' => 'Segundo Nombre', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('apellido_paterno', 'Apellido Paterno') }}
      {{ Form::text('apellido_paterno', null, array('placeholder' => 'Apellido Paterno', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('apellido_materno', 'Apellido Materno') }}
      {{ Form::text('apellido_materno', null, array('placeholder' => 'Apellido Materno', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento') }}
      {{ Form::date('fecha_nacimiento', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('lugar_nacimiento', 'Lugar de Nacimiento') }}
      {{ Form::text('lugar_nacimiento', null, array('placeholder' => 'Lugar de Nacimiento', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('edad_paciente', 'Edad del Paciente') }}
      {{ Form::text('edad_paciente', null, array('placeholder' => 'Edad del Paciente', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('peso', 'Peso') }}
      {{ Form::text('peso', null, array('placeholder' => 'Peso', 'class' => 'form-control')) }}        
    </div>

  </div>
  {{ Form::button($tipo.' Paciente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop