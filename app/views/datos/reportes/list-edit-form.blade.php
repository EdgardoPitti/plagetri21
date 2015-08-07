@extends ('layout')

@section ('title') Reportes @stop

@section ('content')
<h1>
 <div style="position:relative;">
    <div style="position:absolute;left:0px;">
      <a href="{{URL::to('/')}}" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span><span class="return"> Inicio</span></a>
    </div>
  </div>
  <center>Reportes</center>
</h1><hr>

  <div class="portlet">
  	<div class="tabbable-panel">
  		<div class="tabbable-line">			
  			<ul class="nav nav-tabs ">
  				<li class="active">
  					<a href="#tab1" data-toggle="tab">
  					Más costosos </a>
  				</li>
  				<li>
  					<a href="#tab2" data-toggle="tab">
  					Act. con más fallas </a>
  				</li>
  				<li>
  					<a href="#tab3" data-toggle="tab">
  					Garantías </a>
  				</li>
  			</ul>
  			<div class="tab-content">
  				<div class="tab-pane fade in active" id="tab1">
  					tab 1
  				</div>
  				<div class="tab-pane fade" id="tab2">
  					<div class="overthrow" style="height:200px;">
                <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" id="dev-table">
                 <thead>
                  <tr class="info">
                      <th>#</th>
                      <th>Número de Activo</th>
                      <th>Nombre</th>
                      <th>Fecha de Garantía</th>
                      <th>Costo</th>
                  </tr>
                </thead>   
                <tbody id="bodytable">
                  {{--*/ $x = 1; /*--}}
                  @foreach (Activo::all() as $activo)
                    <tr>
                        <td>{{ $x++ }}.</td>
                        <td>{{ $activo->num_activo }}</td>
                        <td>{{ $activo->nombre }}</td>
                        @if(empty($activo->fecha_garantia))
                          <td>NO DEFINIDO</td>
                        @else
                          {{--*/$date = new DateTime($activo->fecha_garantia);/*--}}
                          <td>{{ $date->format('jS \\of F Y') }}</td>
                        @endif
                        <td>{{ $activo->costo }}</td>
                    </tr>
                  @endforeach
                  </tbody> 
                </table>
              </div>
  				</div>
  				<div class="tab-pane fade" id="tab3">
             {{--*/ $fecha_actual = Carbon::now() /*--}}
             Garantías desde: 
              {{ Form::text('fecha_inicio', $fecha_actual->format('Y-m-d'), array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio' ,'min' => '1950-01-01', 'max' => '2020-12-31')) }}
              hasta:
              {{ Form::text('fecha_fin', date('Y-m-d', strtotime(" +1 month")), array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin', 'min' => '1950-01-01', 'max' => '2020-12-31')) }}
              <div class="overthrow" style="height:200px;">
                <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" id="dev-table">
                 <thead>
                  <tr class="info">
                      <th>#</th>
                      <th>Número de Activo</th>
                      <th>Nombre</th>
                      <th>Fecha de Garantía</th>
                      <th>Costo</th>
                  </tr>
                </thead>   
                <tbody id="bodytable">
                  {{--*/ $x = 1; /*--}}
                  @foreach (Activo::all() as $activo)
                    <tr>
                        <td>{{ $x++ }}.</td>
                        <td>{{ $activo->num_activo }}</td>
                        <td>{{ $activo->nombre }}</td>
                        @if(empty($activo->fecha_garantia))
                          <td>NO DEFINIDO</td>
                        @else
                          {{--*/$date = new DateTime($activo->fecha_garantia);/*--}}
                          <td>{{ $date->format('jS \\of F Y') }}</td>
                        @endif
                        <td>{{ $activo->costo }}</td>
                    </tr>
                  @endforeach
                  </tbody> 
                </table>
              </div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

@stop
