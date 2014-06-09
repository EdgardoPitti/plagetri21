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
		<div class="overthrow" style="overflow:auto;width:100%;">
	        <table class="table table-bordered" id="tabla_citas">
			  	<thead>
			  		<tr class="info">
			  			<th>#</th>
			  			<th>Marcador</th>
			  			<th>Mediana</th>
			  			<th style="width:90px;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		{{--*/ $x = 1; /*--}}
			  		@foreach (Marcador::all() as $marcador)
				  		<tr align="center">
				  			<td>{{ $x++ }}.</td>
				  			<td>{{ $marcador->marcador }}</td>
				  			<td>
				  				<div id="mediana_{{ $marcador->id }}">
				  				{{ Form::text('valor_'.$marcador->id.'', $marcadores[$marcador->id]->mediana_marcador, array('class' => 'form-control', 'readonly' => 'readonly')) }}	
				  				</div>
				  			</td>
				  			<td>
				  				<div id="button_{{ $marcador->id }}">
				  					{{ Form::button('<span class="glyphicon glyphicon-pencil"></span> Editar', array('type' => 'submit', 'class' => 'btn btn-primary btn-sm', 'onClick' => 'CambioMediana('.$marcador->id.')', 'title' => 'Editar Mediana')) }}
				  				</div>
				  			</td>
				  		</tr>
			  		@endforeach
			  	</tbody>
			</table>
		</div>
@stop