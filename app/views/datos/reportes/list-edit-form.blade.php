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
					tab 2
				</div>
				<div class="tab-pane fade" id="tab3">
					tab 3
				</div>
			</div>
		</div>
	</div>
</div>
@stop
