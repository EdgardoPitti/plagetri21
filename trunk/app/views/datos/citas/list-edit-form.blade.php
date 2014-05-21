@extends ('layout')

@section('title')
	Citas Médicas
@stop

@section('content')
<h1>
  <div class="pull-left">
    <a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Inicio</a>
  </div>
  <center>Citas Médicas</center>
</h1>
 <div class="row">
  <div class="col-md-12 col-sm-12 col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de Pacientes</h3>
        <div class="pull-right">
          <span class="clickable filter" data-toggle="tooltip" title="Activar/Desactivar Filtro" data-container="body">
            <i class="glyphicon glyphicon-filter"></i>
          </span>
        </div>
      </div>
      <div class="panel-body">
        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Pacientes" /><br>
		      <div class="table-responsive">
		        <table class="table table-bordered table-hover" id="dev-table">
				  	<thead>
				  		<tr>
				  			<th>#</th>
				  			<th>Cédula</th>
				  			<th>Nombre Completo</th>
				  			<th>Edad</th>
				  			<th>Etnia</th>
				  			<th>Raza</th>
				  			<th>Diabetes</th>
				  			<th>Accesos</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				  		{{--*/ $n=1; /*--}}
				  		@foreach ($pacientes as $paciente)
				  		<tr align="center">
				  			<td>{{ $n++ }}.</td>
				  			<td>{{ $paciente->cedula }}</td>
				  			<td>{{ $paciente->primer_nombre }}</td>
				  			<td>{{ $paciente->edad }}</td>
				  			<td>{{ $paciente->etnia }}</td>
				  			<td>{{ $paciente->raza }}</td>
				  			<td>{{ $paciente->diabetes }}</td>
				  			<td>
				  				<a href="{{ route('datos.citas.show', $paciente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Crear Cita</a>
				  				<a href="{{ route('datos.pacientes.edit', $paciente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Editar</a>
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
    
<hr>
@stop