<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Datos de Pacientes')</title>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	  <link rel="shortcut icon" href='/plagetri21/public/imgs/favicon.ico' type="image/x-icon">    
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/estilo.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/font-awesome.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/perfect-scrollbar.min.css', array('media' => 'screen')) }}
    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->      
    @yield('scripts')  
  </head>
  <body>    
    {{-- Wrap all page content here --}}
    <div id="wrap" >
      {{-- Begin page content --}}          
      <div class="container">    
        @if(Auth::check())
          <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container" style="margin-top:auto">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                      
                  </button>
                  <a class="navbar-brand" href="/plagetri21/public"><img src="/plagetri21/public/imgs/logo.png"/><b>Plagetri21</b></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">          
                  <ul class="nav navbar-nav navbar-right">           
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight:bold;"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->user }} <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        @if(Auth::user()->id_grupo_usuario == 1)
                          <li><a href="/plagetri21/public/registro"><i class="fa fa-user fa-lg"></i>&nbsp; Registrar Usuario</a></li>                       
                          <li><a href="/plagetri21/public/datos/modulos"><i class="fa fa-users fa-lg"></i> Grupos - Módulos</a></li>
                          <!--li>{{ HTML::link('datos/modulos', ' Grupos - Módulos', array('class' => 'fa fa-users')) }}</li-->
                          <li><a href="{{ route('datos.configuracion.index') }}"><i class="fa fa-cog fa-lg"></i>&nbsp; Configuración</a></li>
                        @endif
                        <li><a href="/plagetri21/public/logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a></li>                       
                        <!--li>{{ HTML::link('logout', ' Cerrar Sesión', array('class' => 'fa fa-sign-out')) }}</li-->
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>   
          </div>
        @endif
        @yield('content')  
      </div>
    </div>
    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/admin.js') }}
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/perfect-scrollbar.min.js') }} 
    <script type="text/javascript">
    	
    </script>
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/filtro.js') }}
    {{ HTML::script('assets/js/script.js') }}
    {{ HTML::script('assets/js/script_foto.js') }}
    {{ HTML::script('assets/js/script_maps.js') }}        
    
  </body>
</html>
