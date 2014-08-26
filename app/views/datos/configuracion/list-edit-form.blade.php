@extends ('layout')

@section('title')
	Configuración del Sistema
@stop

@section('content')
		<h1>
		 <div style="position:relative;">
			<div style="position:absolute;left:0px;">
		    	<a href="/plagetri21/public" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
			</div>
		 </div>
		 <center>Configuración del Sistema</center>
		</h1>
		<div class="overthrow" style="overflow:auto;width:100%;">
			<table class="table table-bordered table-hover" >
				<thead>
					<tr class="info">
						<th>#</th>
						<th>Marcador</th>
						<th>Unidad </th>
						<th>Usuario</th>
						<th>Creado</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					{{--*/ $n=1; /*--}}
					@foreach(Marcador::all() as $marcadores)
						<tr class="white" align="center">
							<td>{{ $n++ }}.</td>
							<td>{{ $marcadores->marcador }}</td>
							@if(empty(UnidadMarcador::where('id_marcador', $marcadores->id)->get()->last()->id))
								<td>No Asignada</td>
								<td>No Definido</td>
								<td>No Asignada</td>
							@else
								@if(!empty(UnidadMarcador::where('id_marcador', $marcadores->id)->get()->last()->id_unidad))
									<td>{{ Unidad::where('id', UnidadMarcador::where('id_marcador', $marcadores->id)->get()->last()->id_unidad)->get()->last()->unidad }}</td>
								@endif
								@if(!empty(UnidadMarcador::where('id_marcador', $marcadores->id)->get()->last()->id_usuario))
									<td>{{ User::where('id', UnidadMarcador::where('id_marcador', $marcadores->id)->get()->last()->id_usuario)->get()->last()->user }}</td>
								@endif
								<td>{{ UnidadMarcador::where('id_marcador', $marcadores->id)->get()->last()->created_at }}</td>
							@endif
							<td><a href="{{ route('datos.configuracion.edit', $marcadores->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar Unidad"><span class="glyphicon glyphicon-pencil"></span></a></td>
						</tr> 
						
					@endforeach
				</tbody>
			</table>
		</div>
		@if($unidadmarcador->id_marcador <> 0)
			{{ Form::open(array('route' => 'datos.configuracion.store', 'method' => 'POST'), array('role' => 'form')) }}
					<div class="row">
						<div class="form-group col-sm-4 col-md-4 col-lg-4 col-md-offset-4 col-sm-offset-2">
							{{ Form::label('marcador', 'Marcador:') }}
							{{ Form::text('marcador', Marcador::where('id', $unidadmarcador->id_marcador)->first()->marcador, array('class' => 'form-control', 'disabled' => 'disabled')) }}        
							{{ Form::text('control', 1, array('class' => 'form-control', 'style' => 'display:none')) }}
							{{ Form::text('id_marcador', $unidadmarcador->id_marcador, array('class' => 'form-control', 'style' => 'display:none')) }}        
						</div>
						<div class="form-group col-sm-4 col-md-4 col-lg-4 col-md-offset-4">
							{{ Form::label('id_unidad', 'Unidad del Marcador:') }}
							@if(!empty($unidadmarcador->id))
								{{ Form::select('id_unidad', Unidad::lists('unidad', 'id'), $unidadmarcador->id_unidad , array('class' => 'form-control')) }}
							@else
								{{ Form::select('id_unidad', Unidad::lists('unidad', 'id'), null , array('class' => 'form-control')) }}
							@endif
						</div>
					</div>
					<center>{{ Form::button('Salvar Unidad', array('type' => 'submit', 'class' => 'btn btn-primary')) }}</center>
			{{ Form::close() }}
		@endif
			{{ Form::open(array('route' => 'datos.configuracion.store', 'method' => 'POST'), array('role' => 'form')) }}
			    <div class="form-group col-sm-4 col-md-4 col-lg-4">
					{{ Form::text('control', 2, array('class' => 'form-control', 'style' => 'display:none')) }}
					{{ Form::label('automatico', 'Automatico:') }}
					{{ Form::checkbox('automatico', 1, null,  array('class' => 'form-control cmn-toggle cmn-toggle-round-flat', 'id' => 'cmn-toggle-1', 'onClick' => 'Disable()')) }}
					<label for="cmn-toggle-1"></label>
				</div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
				   	{{ Form::label('registros', 'Cantidad de Registros:') }}
				   	{{ Form::input('number', 'registros', null, array('class' => 'form-control','min' => '0' ,'max'=>'1000','step' => '5','id' => 'registros','placeholder' => 'Registros 0 - 1000', 'disabled' => 'true')) }}        
				</div>
				<div class="form-group col-sm-4 col-md-4 col-lg-4">
					 	{{ Form::label('', '') }}
					<center>{{ Form::button('Salvar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}</center>
				</div>
			{{ Form::close() }}
	{{ HTML::script('assets/js/overthrow/overthrow-detect.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-init.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-polyfill.js') }}
    {{ HTML::script('assets/js/overthrow/overthrow-toss.js') }}
@stop
