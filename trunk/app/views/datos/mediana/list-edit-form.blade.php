@extends ('layout')

@section('title')
	Mediana de Marcadores
@stop

@section('content')
		<h1>
		 <div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
			</div>
		 </div>
		  <center>Mediana Marcadores</center>
		</h1>

		<h3>Editar Marcadores</h3>
			{{ Form::open(array('route' => 'datos.mediana.store', 'method' => 'POST'), array('role' => 'form')) }}
				<div class="row">
					<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('semana', 'Semana del Marcador:') }}
      					{{ Form::selectRange('semana', 0, 37, null ,array('class' => 'form-control', 'required' => 'required')) }}
    				</div>
    				<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('marcador', 'Marcador:') }}
      					{{ Form::select('marcador', array('0' => 'MARCADOR') + Marcador::all()->lists('marcador', 'id'), null, array('class' => 'form-control', 'required' => 'required')) }}
    				</div>
    				<div class="form-group col-sm-4 col-md-4 col-lg-4">
      					{{ Form::label('mediana', 'Mediana del Marcador:') }}
      					{{ Form::text('mediana', null, array('placeholder' => 'MEDIANA MARCADOR', 'class' => 'form-control', 'required' => 'required')) }}
    				</div>
    			</div>
    			<center>{{ Form::button('Salvar Marcador', array('type' => 'submit', 'class' => 'btn btn-primary')) }}</center>
			{{ Form::close() }}<hr>
		<div class="overthrow" style="overflow:auto;width:100%;">
	        <table class="table table-bordered" id="tabla_citas">
			  	<thead>
			  		<tr class="info">
			  			<th>Semana</th>
			  			@foreach (Marcador::all() as $marcadores)
			  				<th>{{ $marcadores->marcador }}</th>
			  			@endforeach
			  		</tr>
			  	</thead>
			  	<tbody>
			  		@for($s = 1; $s < 38; $s++)
			  			@if (!empty(MedianaMarcador::where('semana', $s)->first()->id))
			  			<tr align="center">
			  				<td>{{ $s }}</td>
			  				@foreach (Marcador::all() as $marcador)
			  					@if (!empty(MedianaMarcador::where('id_marcador', $marcador->id)->where('semana', $s)->first()->id))
			  						<td>{{ MedianaMarcador::where('id_marcador', $marcador->id)->where('semana', $s)->first()->mediana_marcador }}</td>
			  					@else
			  						<td>0</td>
			  					@endif
			  				@endforeach
			  			</tr>
			  			@endif
			  		@endfor
			  	</tbody>
			</table>
		</div>
@stop