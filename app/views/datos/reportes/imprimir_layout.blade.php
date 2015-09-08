<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8"/>
	<style type="text/css">
    	html, body{
			height:100%;    	
    	}
    	body{
			margin:-30px;			
			padding: 20px;
			border:1px solid #000;
			border-radius:6px;    	
    	}    	
    	h1, h2,h3,h4,h5,h6,p{
			margin: 0px;    	
    	}
    	.header{
    		margin-bottom: 15px;
    	}
    	.img_position{
    		position:absolute;
    		top:20px;
    		left:20px;
    		right:0px;
    	}
    	.texto12{
    		font-size: 12px;
    	}
    	.contenido{
    		font-size: 14px;
    	}    	
    </style>
    @yield('css')
</head>
<body>
	<div class="header">
		<div class="img_position">
			<img src="imgs/logoch.png">		
		</div>	
		<div>
			<center>
				<h1>HOSPITAL CHIRIQUÍ</h1>
				<h3 style="font-style:italic;">Atención 24 horas</h3>
		    </center>
		</div>
	    <div class="texto12">
	    	APDO. 0426-01141 DAVID - CHIRIQUI<br>
	    	e-mail: laboratorio@hospitalchiriqui.com<br>
	        www.hospitalchiriqui.com
	    </div>
	</div>

	<div class="contenido">
		@yield('contenido')
	</div>
</body>
</html>