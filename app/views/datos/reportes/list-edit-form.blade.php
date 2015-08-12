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
   
    // Función que permite cambiar el idioma a las fechas
    setlocale(LC_TIME, 'Spanish'); 
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
  					Activos </a>
  				</li>
  				<li>
  					<a href="#tab3" data-toggle="tab">
  					Garantías </a>
  				</li>
  			</ul>
  			<div class="tab-content">
          <!--  TAB COSTO -->
  				<div class="tab-pane fade in active" id="tab1">
            <div class="portlet">
              <div class="tabbable-panel">
                <div class="tabbable-line">     
                  <ul class="nav nav-tabs ">
                    <li class="active">
                      <a href="#tab4" data-toggle="tab">
                      Costo de Activos</a>
                    </li>
                    <li>
                      <a href="#tab5" data-toggle="tab">
                      Costo de Mantenimientos</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <!--  TAB COSTO DE ACTIVOS -->
                    <div class="tab-pane fade in active" id="tab4">
                      <div class="well well-sm">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label class="control-label col-sm-4">Comprados desde:</label> 
                            <div class="col-sm-8">
                              <div class="input-daterange input-group">
                                {{ Form::text('fecha_inicio_costo_1', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_costo_1' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                <span class="input-group-addon">hasta</span>
                                {{ Form::text('fecha_fin_costo_1', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_costo_1', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="overthrow table-responsive" style="height:200px;">
                        <table class="table table-hover table-bordered">
                           <thead>
                            <tr class="info">
                                <th style="padding:8px;">#</th>
                                <th style="padding:8px;">Número de Activo</th>
                                <th style="padding:8px;">Nombre</th>
                                <th style="padding:8px;">Modelo</th>
                                <th style="padding:8px;">Marca</th>
                                <th style="padding:8px;">Serie</th>
                                <th style="padding:8px;">Fecha de Compra</th>
                                <th style="padding:8px;">Costo</th>
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
                                  <td>{{ Carbon::parse($activo->fecha_compra)->formatLocalized('%d %b %Y') }}</td>
                                  @endif
                                  <td>{{ $activo->costo }}</td>
                              </tr>
                            @endforeach
                          </tbody> 
                        </table>
                      </div>
                    </div>

                    <!--  TAB COSTO DE MANTENIMIENTOES -->
                    <div class="tab-pane fade" id="tab5">
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
                              <!--  TAB PREVENTIVO -->
                              <div class="tab-pane fade in active" id="tab7">
                                <div class="well well-sm">
                                  <div class="form-horizontal">
                                    <div class="form-group">
                                      <label class="control-label col-sm-4">Mant. Preventivos realizados desde:</label>
                                      <div class="col-sm-8">
                                        <div class="input-daterange input-group">
                                          {{ Form::text('fecha_inicio_preventivo', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_preventivo' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                          <span class="input-group-addon">hasta</span>
                                          {{ Form::text('fecha_fin_preventivo', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_preventivo', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 </div>

                                <div class="overthrow table-responsive" style="height:200px;overflow:auto;">
                                  <table class="table table-hover table-bordered">
                                    <thead>
                                      <tr class="info">
                                        <th style="padding:8px;">#</th>
                                        <th style="padding:8px;">Fecha Realizacion</th>
                                        <th style="padding:8px;">Número de Act.</th>
                                        <th style="padding:8px;">Nombre de Act.</th>
                                        <th style="padding:8px;">Marca</th>
                                        <th style="padding:8px;">Modelo</th>
                                        <th style="padding:8px;">Serie</th>
                                        <th style="padding:8px;">Realizado</th>
                                        <th style="padding:8px;">Aprobado</th>
                                        <th style="padding:8px;">Costo</th>
                                      </tr>
                                    </thead>
                                    <tbody id="bodytable_preventivo">
                                    {{--*/ $x = 1; /*--}}
                                    @foreach (DB::select("SELECT * FROM mantenimiento_preventivo") as $preventivo)
                                      <tr>
                                          <td>{{ $x++ }}.</td>
                                          <td>{{ Carbon::parse($preventivo->fecha_realizacion )->formatLocalized('%d %b %Y') }}</td>
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
                              <!--  TAB CORRECTIVO -->
                              <div class="tab-pane fade" id="tab8">
                                <div class="well well-sm">
                                  <div class="form-horizontal">
                                    <div class="form-group">
                                      <label class="control-label col-sm-4">Mant. Correctivos realizados desde: </label>
                                      <div class="col-sm-8">
                                        <div class="input-daterange input-group">
                                          {{ Form::text('fecha_inicio_correctivo', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_correctivo' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                          <span class="input-group-addon">hasta</span>
                                          {{ Form::text('fecha_fin_correctivo', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_correctivo', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="overthrow table-responsive" style="height:200px;overflow:auto;">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                      <tr class="info">
                                        <th style="padding:8px;">#</th>
                                        <th style="padding:8px;">Fecha Realizacion</th>
                                        <th style="padding:8px;">Número de Act.</th>
                                        <th style="padding:8px;">Nombre de Act.</th>
                                        <th style="padding:8px;">Marca</th>
                                        <th style="padding:8px;">Modelo</th>
                                        <th style="padding:8px;">Serie</th>
                                        <th style="padding:8px;">Realizado</th>
                                        <th style="padding:8px;">Aprobado</th>
                                        <th style="padding:8px;">Costo</th>
                                      </tr>
                                    </thead>
                                    <tbody id="bodytable_correctivo">
                                    {{--*/ $x = 1; /*--}}
                                    @foreach (DB::select("SELECT * FROM mantenimiento_correctivo") as $correctivo)
                                      <tr>
                                          <td>{{ $x++ }}.</td>
                                          <td>{{ Carbon::parse($correctivo->fecha_realizacion)->formatLocalized('%d %b %Y') }}</td>
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
                </div>
              </div>
            </div>
  				</div>

          <!--  TAB ACTIVOS-->
  				<div class="tab-pane fade" id="tab2">
              <!--  TAB COSTO DE MANTENIMIENTOES -->
              
                <div class="portlet">
                  <div class="tabbable-panel">
                    <div class="tabbable-line">     
                      <ul class="nav nav-tabs ">
                        <li class="active">
                          <a href="#tab9" data-toggle="tab">
                          Mantenimientos Preventivos</a>
                        </li>
                        <li>
                          <a href="#tab10" data-toggle="tab">
                          Mantenimientos Correctivos</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <!--  TAB PREVENTIVO -->
                        <div class="tab-pane fade in active" id="tab9">
                         <div class="well well-sm">
                            <div class="form-horizontal">
                              <div class="form-group">
                                <label class="control-label col-sm-4">Mant. Preventivos realizados desde: </label>
                                <div class="col-sm-8">
                                  <div class="input-daterange input-group">
                                    {{ Form::text('fecha_inicio_preventivo_activo', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_preventivo_activo' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                    <span class="input-group-addon">hasta</span>
                                    {{ Form::text('fecha_fin_preventivo_activo', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_preventivo_activo', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="overthrow table-responsive" style="height:200px;">
                            <table class="table table-hover table-bordered">
                               <thead>
                                <tr class="info">
                                    <th style="padding:8px;">#</th>
                                    <th style="padding:8px;">Número de Activo</th>
                                    <th style="padding:8px;">Nombre</th>
                                    <th style="padding:8px;">Modelo</th>
                                    <th style="padding:8px;">Serie</th>
                                    <th style="padding:8px;">Marca</th>
                                    <th style="padding:8px;">Tipo Fuente</th>
                                    <th style="padding:8px;">Cantidad de Mantenimientos</th>
                                </tr>
                              </thead>   
                              <tbody id="bodytable_preventivo_activo">
                                {{--*/ $x = 1; /*--}}
                                @foreach (DB::select("SELECT * FROM activos_preventivos") as $fallas)
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
                        <!--  TAB CORRECTIVO -->
                        <div class="tab-pane fade" id="tab10">
                         <div class="well well-sm">
                            <div class="form-horizontal">
                              <div class="form-group">
                                <label class="control-label col-sm-4">Mant. Correctivos realizados desde: </label>
                                <div class="col-sm-8">
                                  <div class="input-daterange input-group">
                                    {{ Form::text('fecha_inicio_correctivo_activo', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio_correctivo_activo' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                    <span class="input-group-addon">hasta</span>
                                    {{ Form::text('fecha_fin_correctivo_activo', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin_correctivo_activo', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="overthrow table-responsive" style="height:200px;">
                            <table class="table table-hover table-bordered">
                               <thead>
                                <tr class="info">
                                    <th style="padding:8px;">#</th>
                                    <th style="padding:8px;">Número de Activo</th>
                                    <th style="padding:8px;">Nombre</th>
                                    <th style="padding:8px;">Modelo</th>
                                    <th style="padding:8px;">Serie</th>
                                    <th style="padding:8px;">Marca</th>
                                    <th style="padding:8px;">Tipo Fuente</th>
                                    <th style="padding:8px;">Cantidad de Mantenimientos</th>
                                </tr>
                              </thead>   
                              <tbody id="bodytable_correctivo_activo">
                                {{--*/ $x = 1; /*--}}
                                @foreach (DB::select("SELECT * FROM activos_correctivos") as $fallas)
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
                      </div>
                    </div>
                  </div>
                </div>
  				</div>

          <!--  TAB GARANTIA -->
  				<div class="tab-pane fade" id="tab3">
            <div class="well well-sm">
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-4">Garantías desde: </label>
                  <div class="col-sm-8">
                    <div class="input-daterange input-group">
                      {{ Form::text('fecha_inicio', $fecha_actual, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_inicio' ,'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                      <span class="input-group-addon">hasta</span>
                      {{ Form::text('fecha_fin', $fecha_mes, array('class' => 'form-control datepicker', 'placeholder' => 'aaaa-mm-dd','id' => 'fecha_fin', 'min' => '1950-01-01', 'max' => '2040-12-31')) }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="overthrow table-responsive" style="height:200px;">
                <table class="table table-hover table-bordered">
                 <thead>
                  <tr class="info">
                      <th style="padding:8px;">#</th>
                      <th style="padding:8px;">Número de Activo</th>
                      <th style="padding:8px;">Nombre</th>
                      <th style="padding:8px;">Fecha de Garantía</th>
                      <th style="padding:8px;">Costo</th>
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
                          <td>{{ Carbon::parse($activo->fecha_garantia)->formatLocalized('%d %b %Y') }}</td>
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
