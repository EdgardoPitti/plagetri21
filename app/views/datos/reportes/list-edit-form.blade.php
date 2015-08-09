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
{{--*/ $fecha_actual = Carbon::now()->format('Y-m-d');
      $fecha_mes = date('Y-m-d', strtotime(" +1 month"));
/*--}}

  <div class="portlet">
  	<div class="tabbable-panel">
  		<div class="tabbable-line">			
  			<ul class="nav nav-tabs ">
  				<li class="active">
  					<a href="#tab1" data-toggle="tab">
  					Costos</a>
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
  					<div class="overthrow" >
                  <div class="portlet">
                    <div class="tabbable-panel">
                      <div class="tabbable-line">     
                        <ul class="nav nav-tabs ">
                          <li class="active">
                            <a href="#tab4" data-toggle="tab">
                            Activos mas Cost.</a>
                          </li>
                          <li>
                            <a href="#tab5" data-toggle="tab">
                            Mantenimientos mas Cost.</a>
                          </li>
                          <li>
                            <a href="#tab6" data-toggle="tab">
                            Costo 3
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane fade in active" id="tab4">
                           Comprados desde: 
                            {{ Form::text('fecha_inicio_costo_1', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_costo_1' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                            hasta:
                            {{ Form::text('fecha_fin_costo_1', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_costo_1', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                            <div class="overthrow" style="height:200px;">
                              <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" id="dev-table">
                                 <thead>
                                  <tr class="info">
                                      <th>#</th>
                                      <th>Número de Activo</th>
                                      <th>Nombre</th>
                                      <th>Modelo</th>
                                      <th>Marca</th>
                                      <th>Serie</th>
                                      <th>Fecha de Compra</th>
                                      <th>Costo</th>
                                  </tr>
                                </thead>   
                                <tbody id="bodytable_costos_activos">
                                  {{--*/ $x = 1; /*--}}
                                  @foreach (Activo::where('id', '>', '0')->orderBy('costo', 'desc')->get() as $activo)
                                    <tr>
                                        <td>{{ $x++ }}.</td>
                                        <td>{{ $activo->num_activo }}</td>
                                        <td>{{ $activo->nombre }}</td>
                                        <td>{{ $activo->modelo }}</td>
                                        <td>{{ $activo->marca }}</td>
                                        <td>{{ $activo->serie }}</td>
                                        @if(empty($activo->fecha_compra))
                                        <td>NO DEFINIDO</td>
                                        @else
                                        {{--*/$date = new DateTime($activo->fecha_compra);/*--}}
                                        <td>{{ $date->format('jS \\of F Y') }}</td>
                                        @endif
                                        <td>{{ $activo->costo }}</td>
                                    </tr>
                                  @endforeach
                                </tbody> 
                              </table>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tab5">
                            <div class="overthrow">
                               <div class="portlet">
                                <div class="tabbable-panel">
                                  <div class="tabbable-line">     
                                    <ul class="nav nav-tabs ">
                                      <li class="active">
                                        <a href="#tab7" data-toggle="tab">
                                        Preventivo</a>
                                      </li>
                                      <li>
                                        <a href="#tab8" data-toggle="tab">
                                        Correctivo</a>
                                      </li>
                                    </ul>
                                    <div class="tab-content">
                                      <div class="tab-pane fade in active" id="tab7">
                                      Mant. Preventivos realizados desde: 
                                        {{ Form::text('fecha_inicio_preventivo', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_preventivo' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                        hasta:
                                        {{ Form::text('fecha_fin_preventivo', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_preventivo', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}

                                        <div class="overthrow" style="height:200px;">
                                          <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" id="dev-table">
                                            <thead>
                                              <tr class="info">
                                                <th>#</th>
                                                <th>Fecha Realizacion</th>
                                                <th>Número de Act.</th>
                                                <th>Nombre de Act.</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Serie</th>
                                                <th>Realizado</th>
                                                <th>Aprobado</th>
                                                <th>Costo</th>
                                              </tr>
                                            </thead>
                                            <tbody id="bodytable_preventivo">
                                            {{--*/ $x = 1; /*--}}
                                            @foreach (DB::select("SELECT * FROM mantenimiento_preventivo") as $preventivo)
                                              <tr>
                                                  <td>{{ $x++ }}.</td>
                                                  <td>{{ $preventivo->fecha_realizacion }}</td>
                                                  <td>{{ $preventivo->num_activo }}</td>
                                                  <td>{{ $preventivo->nombre }}</td>
                                                  <td>{{ $preventivo->marca }}</td>
                                                  <td>{{ $preventivo->modelo }}</td>
                                                  <td>{{ $preventivo->serie }}</td>
                                                  <td>{{ $preventivo->realizado_por }}</td>
                                                  <td>{{ $preventivo->aprobado_por }}</td>
                                                  <td>{{ $preventivo->costo_mantenimiento }}</td>
                                              </tr>
                                            @endforeach
                                            </tbody> 
                                          </table>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="tab8">
                                      Mant. Correctivos realizados desde: 
                                        {{ Form::text('fecha_inicio_correctivo', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_correctivo' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                        hasta:
                                        {{ Form::text('fecha_fin_correctivo', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_correctivo', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                        <div class="overthrow" style="height:200px;">
                                        <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" id="dev-table">
                                            <thead>
                                              <tr class="info">
                                                <th>#</th>
                                                <th>Fecha Realizacion</th>
                                                <th>Número de Act.</th>
                                                <th>Nombre de Act.</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Serie</th>
                                                <th>Realizado</th>
                                                <th>Aprobado</th>
                                                <th>Costo</th>
                                              </tr>
                                            </thead>
                                            <tbody id="bodytable_correctivo">
                                            {{--*/ $x = 1; /*--}}
                                            @foreach (DB::select("SELECT * FROM mantenimiento_correctivo") as $correctivo)
                                              <tr>
                                                  <td>{{ $x++ }}.</td>
                                                  <td>{{ $correctivo->fecha_realizacion }}</td>
                                                  <td>{{ $correctivo->num_activo }}</td>
                                                  <td>{{ $correctivo->nombre }}</td>
                                                  <td>{{ $correctivo->marca }}</td>
                                                  <td>{{ $correctivo->modelo }}</td>
                                                  <td>{{ $correctivo->serie }}</td>
                                                  <td>{{ $correctivo->realizado_por }}</td>
                                                  <td>{{ $correctivo->aprobado_por }}</td>
                                                  <td>{{ $correctivo->costo_mantenimiento }}</td>
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
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tab6">
                            <div class="overthrow" style="height:200px;">
                            Costo 3
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
  				</div>
  				<div class="tab-pane fade" id="tab2">
             Mant. Correctivos realizados desde: 
              {{ Form::text('fecha_inicio_falla', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_falla' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
              hasta:
              {{ Form::text('fecha_fin_falla', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_falla', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
  					<div class="overthrow" style="height:200px;">
            <table class="table table-hover table-bordered" cellpadding="0" cellspacing="0" id="dev-table">
                 <thead>
                  <tr class="info">
                      <th>#</th>
                      <th>Número de Activo</th>
                      <th>Nombre</th>
                      <th>Modelo</th>
                      <th>Serie</th>
                      <th>Marca</th>
                      <th>Tipo Fuente</th>
                      <th>Fallas (Mant. Correctivo)</th>
                  </tr>
                </thead>   
                <tbody id="bodytable_fallas">
                  {{--*/ $x = 1; /*--}}
                  @foreach (DB::select("SELECT * FROM activos_fallas") as $fallas)
                    <tr>
                        <td>{{ $x++ }}.</td>
                        <td>{{ Activo::where('id', $fallas->id_activo)->first()->num_activo }}</td>
                        <td>{{ Activo::where('id', $fallas->id_activo)->first()->nombre }}</td>
                        <td>{{ Activo::where('id', $fallas->id_activo)->first()->modelo }}</td>
                        <td>{{ Activo::where('id', $fallas->id_activo)->first()->serie }}</td>
                        <td>{{ Activo::where('id', $fallas->id_activo)->first()->marca }}</td>
                        <td>{{ TipoFuente::where('id', Activo::where('id', $fallas->id_activo)->first()->id_tipo)->first()->tipo_fuente }}</td>
                        <td>{{ $fallas->cantidad }}</td>
                    </tr>
                  @endforeach
                  </tbody> 
                </table>
              </div>
  				</div>
  				<div class="tab-pane fade" id="tab3">
             Garantías desde: 
              {{ Form::text('fecha_inicio', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
              hasta:
              {{ Form::text('fecha_fin', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
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
                <tbody id="bodytable_garantias">
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
