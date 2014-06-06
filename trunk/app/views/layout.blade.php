<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Datos de Pacientes')</title>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/estilo.css', array('media' => 'screen')) }}
    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->      
    @yield('scripts')  
  </head>
  <body>    
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}          
      <div class="container">        
        @yield('content')  
      </div>
    </div>
    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    {{ HTML::script('assets/js/jquery.js') }}

    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/filtro.js') }}
    {{ HTML::script('assets/js/script.js') }}
    {{ HTML::script('assets/js/script_maps.js') }}        
  </body>
</html>