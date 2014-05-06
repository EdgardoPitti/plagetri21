@extends ('datos/layout')

@section ('title') Pacientes @stop

@section ('content')

{{--*/
    if($datos['paciente']->exists){
      $datos_formulario =  array('route' => array('datos.pacientes.update', $datos['paciente']->id), 'method' => 'PATCH');
      $tipo = 'Editar';
    
    }else{

      $datos_formulario = array('route' => 'datos.pacientes.store', 'method' => 'POST');
      $tipo = 'Crear';

    }
  /*--}}

<h1>{{ $tipo }} Pacientes</h1>

{{ Form::model($datos['paciente'], $datos_formulario , array('role' => 'form')) }}

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
  {{ Form::button($tipo.' Paciente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}<a href="{{ route('datos.pacientes.index') }}" class="btn btn-info">Limpiar Campos</a>
  
{{ Form::close() }}

  <h1>Lista de Pacientes</h1>

  <table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nombre Completo</th>
        <th>Lugar de Nacimiento</th>
        <th>Edad</th>
        <th>Peso</th>
        <th></th>
    </tr>
    {{--*/ $x = 1; /*--}}
    @foreach ($datos['pacientes'] as $paciente)
      <tr>
          <td>{{ $x++ }}.</td>
          <td>{{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
          <td>{{ $paciente->lugar_nacimiento }}</td>
          <td>{{ $paciente->edad_paciente }}</td>
          <td>{{ $paciente->peso }}</td>
          <td>
            <a href="{{ route('datos.pacientes.show', $paciente->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
            <a href="#" data-id="{{ $paciente->id }}"  class="btn btn-danger btn-delete">Eliminar</a>
          </td>
      </tr>
      
    @endforeach
  </table>
  
 
  {{ Form::open(array('route' => array('datos.pacientes.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  {{ Form::close() }}

@stop