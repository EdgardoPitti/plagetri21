@extends ('datos/layout')

@section ('title') Pacientes @stop

@section ('content')

<h1>{{ $datos['label'] }} Pacientes</h1>

{{ Form::model($datos['paciente'], $datos['form'] , array('role' => 'form')) }}

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
      {{ Form::date('fecha_nacimiento', $datos['paciente']->fecha_nacimiento, array('class' => 'form-control')) }}
    </div>
    {{--Orden de Datos en los select: Name,arreglo con valores, value, arreglo con la clase de diseño--}}
    <div class="form-group col-md-4">
      {{ Form::label('id_provincia', 'Provincia de Nacimiento:') }}
      {{ Form::select('id_provincia',  Provincia::lists('provincia','id_provincia'), $datos['paciente']->id_provincia_nacimiento, array('class' => 'form-control', 'OnChange' => 'datos.paciente.create')); }}    
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_distrito', 'Distrito de Nacimiento:') }}
      {{ Form::select('id_distrito',  Distrito::lists('distrito', 'id_distrito'), $datos['paciente']->id_distrito_nacimiento, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_corregimiento', 'Corregimiento de Nacimiento:') }}
      {{ Form::select('id_corregimiento',  Corregimiento::lists('corregimiento','id_corregimiento'), $datos['paciente']->id_corregimiento_nacimiento, array('class' => 'form-control')); }}    
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
      {{ Form::select('id_nacionalidad',  Nacionalidad::lists('nacionalidad', 'id_nacionalidad'), $datos['paciente']->id_nacionalidad, array('class' => 'form-control')); }}    
    </div>    
    <div class="form-group col-md-4">
      {{ Form::label('id_tipo_sanguineo', 'Tipo de Sangre:') }}
      {{ Form::select('id_tipo_sanguineo',  Tiposangre::lists('tipo_sangre', 'id_tipo_sanguineo'), $datos['paciente']->id_tipo_sangre, array('class' => 'form-control')); }}    
    </div>   
    <div class="form-group col-md-4">
      {{ Form::label('id_raza', 'Raza:') }}
      {{ Form::select('id_raza',  Raza::lists('raza', 'id_razas'), $datos['paciente']->id_raza, array('class' => 'form-control')); }}    
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('id_etnia', 'Etnia:') }}
      {{ Form::select('id_etnia',  Etnia::lists('etnia', 'id_etnia'), $datos['paciente']->id_etnia, array('class' => 'form-control')); }}    
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

  <h1>Lista de Pacientes</h1>

  <table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nombre Completo</th>
        <th>Lugar de Nacimiento</th>
        <th>Fecha Nacimiento</th>
        <th>Celular</th>
        <th>Telefono</th>
        <th>E-Mail</th>
    </tr>
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
  </table>
  
 
  {{ Form::open(array('route' => array('datos.pacientes.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
  {{ Form::close() }}

@stop