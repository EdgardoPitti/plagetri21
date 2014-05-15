@extends ('layout')

@section('title')
	Men&uacute; Principal
@stop
@section('content')
        <a href="{{ route('datos.pacientes.index') }}" class="btn btn-primary">Pacientes</a>
		<a href="{{ route('datos.medicos.index') }}" class="btn btn-primary">M&eacute;dicos</a>       
@stop
