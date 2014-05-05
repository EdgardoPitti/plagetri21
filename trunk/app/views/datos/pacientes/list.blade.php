@extends ('datos/layout')

@section ('title') Lista de Pacientes @stop

@section ('content')

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
    @foreach ($pacientes as $paciente)
      <tr>
          <td>{{ $x++ }}.</td>
          <td>{{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
          <td>{{ $paciente->lugar_nacimiento }}</td>
          <td>{{ $paciente->edad_paciente }}</td>
          <td>{{ $paciente->peso }}</td>
          <td>
            <a href="{{ route('datos.pacientes.show', $paciente->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('datos.pacientes.destroy', $paciente->id) }}" class="btn btn-danger btn-delete">Eliminar</a>
          </td>
      </tr>
      
    @endforeach
  </table>

  <p>
    <a href="{{ route('datos.pacientes.create') }}" class="btn btn-primary">Crear un nuevo Paciente</a>
  </p>

@stop