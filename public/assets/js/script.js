jQuery(document).ready(function($){	
		
		
        //Funcion que carga al cambiar el id_provincia
        $("#id_provincia").change(function(){
            //Funcion GET como primer parametro recibe el url que queremos ejecutar.
            $.get(""+baseurl+"/distrito", 
            //Segundo parametro le mandamos una variable que enviaremos al controlador que es el id de la provincia seleccionada.
            { provincia: $(this).val() }, 
        	function(data){
                //Declaramos variables con los atributos de los campos que vamos a modificar, en este caso los select.
				var campo = $('#id_distrito');
				var campo1 = $('#id_corregimiento');
                //Vaciamos los select
                campo.empty();
				campo1.empty();
                //Llenamos los select con la primerra opcion cada uno respectivamente.
                campo.append("<option value='0'>SELECCIONE DISTRITO</option>");
                campo1.append("<option value='0'>SELECCIONE CORREGIMIENTO</option>");
				//Funcion each es un ciclo que recorre todo los elementos recibidos por el controlador.
                $.each(data, function(index,element) {
                    //Llenamos el select con los option a partir de los valores recibidos.
					campo.append("<option value='"+ element.id_distrito +"'>" + element.distrito + "</option>");
        		});
        	});
        });     
        //Funcion que percibe cuando se cambia un distrito para poder cargar los corregimientos pertenecientes a ese distrito
     	$("#id_distrito").change(function(){
            $.get(""+baseurl+"/corregimiento", 
            { distrito: $(this).val() }, 
        	function(data){
                var campo = $('#id_corregimiento');
                campo.empty();
                campo.append("<option value='0'>SELECCIONE CORREGIMIENTO</option>");				
                $.each(data, function(index,element) {
					campo.append("<option value='"+ element.id_corregimiento +"'>" + element.corregimiento + "</option>");
        		});
        	});
        });
        //Funcion que percibe cuando se cambia una provincia de residencia para poder cargar los distritos pertenecientes a esa provincia
        $("#id_provincia_residencia").change(function(){
            $.get(""+baseurl+"/distrito", 
            { provincia: $(this).val() }, 
            function(data){
                var campo = $('#id_distrito_residencia');
                var campo1 = $('#id_corregimiento_residencia');
                campo.empty();
                campo1.empty();
                campo.append("<option value='0'>SELECCIONE DISTRITO</option>");
                campo1.append("<option value='0'>SELECCIONE CORREGIMIENTO</option>");                
                $.each(data, function(index,element) {
                    campo.append("<option value='"+ element.id_distrito +"'>" + element.distrito + "</option>");
                });
            });
        }); 
        //Funcion que percibe cuando se cambia un distrito de residencia para poder cargar los corregimientos pertenecientes a ese distrito
        $("#id_distrito_residencia").change(function(){
            $.get(""+baseurl+"/corregimiento", 
            { distrito: $(this).val() }, 
            function(data){
                var campo = $('#id_corregimiento_residencia');
                campo.empty();
                    campo.append("<option value='0'>SELECCIONE CORREGIMIENTO</option>");
                $.each(data, function(index,element) {
                    campo.append("<option value='"+ element.id_corregimiento +"'>" + element.corregimiento + "</option>");
                });
            });
        });
        //Funcion que al clickear en el tipo de institucion carga las instituciones pertenecientes a ese tipo
        $("#id_tipo_institucion").click(function(){
            $.get(""+baseurl+"/institucion", 
            { tipo: $(this).val(), provincia: $("#id_provincia_institucion").find(':selected').val() },
            function(data){
                var campo = $('#id_institucion');
                campo.empty();
                    campo.append("<option value='0'>SELECCIONE LA INSTITUCIÓN</option>");
                $.each(data, function(index,element) {
                    campo.append("<option value='"+ element.id +"'>" + element.denominacion + "</option>");
                });
            });
        });
        //Funcion que al clickear en la provincia de la institucion carga las instituciones pertenecientes a esa provincia
        $("#id_provincia_institucion").click(function(){
            $.get(""+baseurl+"/institucionprovincia", 
            { provincia: $(this).val(), tipo: $("#id_tipo_institucion").find(':selected').val() }, 
            function(data){
                var campo = $('#id_institucion');
                campo.empty();
                    campo.append("<option value='0'>SELECCIONE LA INSTITUCIÓN</option>");
                $.each(data, function(index,element) {
                    campo.append("<option value='"+ element.id +"'>" + element.denominacion + "</option>");
                });
            });
        });
        $("#semana").change(function(){
        	obtenerMediana();
        });
        $("#marcador").change(function(){
        	obtenerMediana();
        });
         $("#id_unidad").change(function(){
         	obtenerMediana();
        });
        //Funcion que al cambiar la semana este carga el valor automatico de la mediana del marcador correspondiente
        function obtenerMediana(){
            $.get(""+baseurl+"/obtenermediana", 
            { semana: $("#semana").find(':selected').val(), marcador: $("#marcador").find(':selected').val(), unidad: $("#id_unidad").find(':selected').val()}, 
            function(data){
                var campo = $('#mediana');
                var valor = 0;
                $.each(data, function(index,element) {
                    valor = element.mediana_marcador;
                });
                campo.val(valor);
            });
        };

        //Funcion para el calculo de las semanas de gestacion
        $("#fecha_flebotomia").change(function(){
			var riesgo_pantalla = $("#riesgo_pantalla");
            var valor = $("#riesgo");
            var edadtexto = $("#edad");
         
            riesgo_pantalla.empty();
            
            var fecha = $("#fecha_flebotomia").val();
            var fecha_cita = fecha.split('-');
            
            fecha = $("#fecha_nacimiento").val();
            var fecha_nac = fecha.split('-');
            
            var edad = 0;
            var agno = 0;
            var mes = 0;
            
            agno = fecha_cita[0] - fecha_nac[0];
            
            if(fecha_nac[1] < fecha_cita[1]){
                mes = (fecha_cita[1] - fecha_nac[1])/12;
            }else{
                mes = ((12 - (fecha_nac[1] - fecha_cita[1]))/12);
                agno--;
            }
            edad = parseFloat(agno) + parseFloat(mes.toFixed(2));
            
            edadtexto.val(edad);
            //alert(edad);
			
            var correccion = '1/100';
            var probabilidad = parseFloat(0.000627) + parseFloat(Math.exp(parseFloat(-16.2395) + parseFloat((0.286 * (edad - 0.5)))));
            var riesgo = (1/(1-probabilidad))/probabilidad;
            valor.val(riesgo.toFixed(2));

		    var date1 = $("#fur").val();
            var date2 = $("#fecha_flebotomia").val();
            
		    var semana = $("#semana");

		    riesgo_pantalla.empty();
			if(date1 != ''){
					//Sentencias para el calculo de los dias entre dos fechas
				if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; } 
				if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; } 
				if (parseInt(date1[0], 10) >= 1000) { 
				   var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);
				} else if (parseInt(date1[2], 10) >= 1000) { 
				   var sDate = new Date(date1[2]+"/"+date1[0]+"/"+date1[1]);
				} else { 
				   return 0; 
				} 
				if (parseInt(date2[0], 10) >= 1000) { 
				   var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);
				} else if (parseInt(date2[2], 10) >= 1000) { 
				   var eDate = new Date(date2[2]+"/"+date2[0]+"/"+date2[1]);
				} else { 
				   return 0; 
				} 
				var one_day = 1000*60*60*24; 
				var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day));
				 
				//Sentencia para el calculo de la semanas obteniendo los dias
				var semanas = Math.round(daysApart/7);
				semana.val(semanas);
				//alert(semanas);
			}
            
             if($("#caso_anterior").val() == 1){
				if(semanas >= 12 && semanas <= 14){
						correccion = riesgo*1.0075;
				}else{
					if(semanas > 14 && semanas < 18 ){
						correccion = riesgo*1.0054;
					}
					else{
						correccion = riesgo*1.0042;
					}
				}
			}
			var riesgo_fap = $("#riesgo_fap");
			if(date1 == ''){
				riesgo_pantalla.append("Por Calcular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por Calcular");
			}else{
				if($("#caso_anterior").val() == 1){
					riesgo_pantalla.append("1/"+riesgo.toFixed(2)+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1/"+correccion.toFixed(2)+"");
					riesgo_fap.val(correccion.toFixed(2));	
				}else{
					riesgo_pantalla.append("1/"+riesgo.toFixed(2)+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No tiene");					
				}				
			}
		});
        //Funcion para el calculo de las semanas de gestacion
        $("#fur").change(function(){
			var riesgo_pantalla = $("#riesgo_pantalla");
			
            var riesgo = $("#riesgo").val();
            var riesgo_fap = $("#riesgo_fap");
            
            var date1 = $("#fur").val();
            var date2 = $("#fecha_flebotomia").val();
		    var semana = $("#semana");
		    
			if(date2 != ''){
				//Sentencias para el calculo de los dias entre dos fechas
				if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; } 
				if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; } 
				if (parseInt(date1[0], 10) >= 1000) { 
				   var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);
				} else if (parseInt(date1[2], 10) >= 1000) { 
				   var sDate = new Date(date1[2]+"/"+date1[0]+"/"+date1[1]);
				} else { 
				   return 0; 
				} 
				if (parseInt(date2[0], 10) >= 1000) { 
				   var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);
				} else if (parseInt(date2[2], 10) >= 1000) { 
				   var eDate = new Date(date2[2]+"/"+date2[0]+"/"+date2[1]);
				} else { 
				   return 0; 
				} 
				var one_day = 1000*60*60*24; 
				var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day));
				 
				//Sentencia para el calculo de la semanas obteniendo los dias
				var semanas = Math.round(daysApart/7);
				semana.val(semanas);
				
				//alert(semanas);	
			}
			
			
			var correccion = 100;
			if($("#caso_anterior").val() == 1){
				if(semanas >= 12 && semanas <= 14){
						correccion = riesgo*1.0075;
				}else{
					if(semanas > 14 && semanas <= 18){
						correccion = riesgo*1.0054;
					}
					else{
						correccion = riesgo*1.0042;
					}
				}
			}
			riesgo_pantalla.empty();
			if(date2 == ''){
				riesgo_pantalla.append("Por Calcular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por Calcular");
			}else{
				if($("#caso_anterior").val() != 1){
					riesgo_pantalla.append("1/"+riesgo+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No tiene");
				}else{
					riesgo_pantalla.append("1/"+riesgo+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1/"+correccion.toFixed(2)+"");
					riesgo_fap.val(correccion.toFixed(2));	
				}		
			}
        });
        
        $("#marcadorauto").change(function(){
			$.get(""+baseurl+"/obtenerautomediana", 
				{ marcador: $("#marcadorauto").find(':selected').val(), semana: $("#semanasauto").find(':selected').val()}, 
				function(data){
					var campo = $("#data_mediana");
					campo.empty();
					var x = 1;
					var unidad = 0;
					var texto = '';
					$.each(data, function(index,element) {
						unidad = element.id_unidad;
						if(unidad == 1 && x == 1){
							texto = "<tr><td>"+ x +".</td><td>"+ element.mediana_marcador +"</td>";
							x++;
						}else{
							if(unidad == 1){
								texto += "</tr><tr><td>"+ x +".</td><td>"+ element.mediana_marcador +"</td>";
								x++;
							}else{
								texto += "<td>"+ element.mediana_marcador +"</td>";
							}
						}
						
					});
					texto +="</tr>";
					campo.append(texto)
			});
		});
        $("#semanasauto").change(function(){
			$.get(""+baseurl+"/obtenerautomediana", 
				{ marcador: $("#marcadorauto").find(':selected').val(), semana: $("#semanasauto").find(':selected').val()}, 
				function(data){
					var campo = $("#data_mediana");
					campo.empty();
					var x = 1;
					var unidad = 0;
					var texto = '';
					$.each(data, function(index,element) {
						unidad = element.id_unidad;
						if(unidad == 1 && x == 1){
							texto = "<tr><td>"+ x +".</td><td>"+ element.mediana_marcador +"</td>";
							x++;
						}else{
							if(unidad == 1){
								texto += "</tr><tr><td>"+ x +".</td><td>"+ element.mediana_marcador +"</td>";
								x++;
							}else{
								texto += "<td>"+ element.mediana_marcador +"</td>";
							}
						}
					});
					texto +="</tr>";
					campo.append(texto)
			});
		});
        $("#sigin").submit(function() {
            $('#loading').show(); 
            $('#boton').hide();
            return true; 
        });
       $("#fecha").change(function(){
			$.get(""+baseurl+"/obtenerfecha", 
				{ fecha: $("#fecha").val(), tipo: $("#id_fecha_mantenimiento").val() }, 
				function(data){
					var proxima_fecha = $("#proximo");
					proxima_fecha.val(data);
			});
		});	

		$("#fecha_inicio").change(function(){
		 	obtenerGarantias();	
		});
		
		$("#fecha_fin").change(function(){
			obtenerGarantias();
		});

		//Script para obtener garantias en un rango de fecha
		function obtenerGarantias(){
		 	var bodytable = $("#bodytable_garantias");
			$.get(""+baseurl+"/obtenergarantias", 
				{ fecha_inicio: $("#fecha_inicio").val(), fecha_fin: $("#fecha_fin").val()  }, 
				function(data){
					bodytable.empty();
					var x = 1;
					if($.isEmptyObject(data)){
						bodytable.append('<tr><td colspan="8"><p style="color:red;text-align:center;padding:0;margin:0;">No existen garantias en este rango de fecha</p></td></tr>');
					}else{
						$.each(data, function(index,element) {
							bodytable.append('<tr><td>'+x+'</td><td>'+element.num_activo+'</td><td>'+element.nombre+'</td><td>'+convertirFecha(element.fecha_garantia)+'</td><td>'+element.costo+'</td></tr>');
							x++;
						});
					}
			});	
		};	


		//ID de los Inputs de activos mas costosos
		$("#fecha_inicio_costo_1").change(function(){
		 	obtenerCostoActivos();	
		});
		
		$("#fecha_fin_costo_1").change(function(){
			obtenerCostoActivos();
		});
		
		//Script para obtener los activos mas costosos comprados dentro de un rango de fecha
		function obtenerCostoActivos(){
			var bodytable = $("#bodytable_costos_activos");			
			$.get(""+baseurl+"/obtenercostosactivos", 
				{ fecha_inicio: $("#fecha_inicio_costo_1").val(), fecha_fin: $("#fecha_fin_costo_1").val()  }, 
				function(data){
					bodytable.empty();
					var x = 1;
					if($.isEmptyObject(data)){
						bodytable.append('<tr><td colspan="8"><p style="color:red;text-align:center;padding:0;margin:0;">No existen activos en este rango de fecha</p></td></tr>');
					}else{
						$.each(data, function(index,element) {
							bodytable.append('<tr><td>'+x+'</td><td>'+element.num_activo+'</td><td>'+element.nombre+'</td><td>'+element.modelo+'</td><td>'+element.marca+'</td><td>'+element.serie+'</td><td>'+convertirFecha(element.fecha_compra)+'</td><td>'+element.costo+'</td></tr>');
							x++;
						});						
					}
			}, 'json');
		};
		
		$("#fecha_inicio_falla").change(function(){
		 	obtenerFallas();	
		});
		
		$("#fecha_fin_falla").change(function(){
			obtenerFallas();
		});

		//Funcion para obtener los equipos con mas fallas dentro de un rango de fecha de sus mantenimientos
		function obtenerFallas(){
		 	var bodytable = $("#bodytable_fallas");
			$.get(""+baseurl+"/obtenerfallas", 
				{ fecha_inicio: $("#fecha_inicio_falla").val(), fecha_fin: $("#fecha_fin_falla").val()  }, 
				function(data){
					bodytable.empty();
					var x = 1;
					if($.isEmptyObject(data)){
						bodytable.append('<tr><td colspan="8"><p style="color:red;text-align:center;padding:0;margin:0;">No existen mantenimientos correctivos en este rango de fecha</p></td></tr>');
					}else{
						$.each(data, function(index,element) {
							bodytable.append('<tr><td>'+x+'</td><td>'+element.num_activo+'</td><td>'+element.nombre+'</td><td>'+element.modelo+'</td><td>'+element.serie+'</td><td>'+element.marca+'</td><td>'+element.tipo_fuente+'</td><td>'+element.cantidad+'</td></tr>');
							x++;
						});
					}
			});	
		};

		$("#fecha_inicio_preventivo").change(function(){
		 	obtenerPreventivos();	
		});
		
		$("#fecha_fin_preventivo").change(function(){
			obtenerPreventivos();
		});

		//Funcion para obtener los mantenimientos preventivos dentro de un rango de fecha
		function obtenerPreventivos(){
		 	var bodytable = $("#bodytable_preventivo");
			$.get(""+baseurl+"/obtenerpreventivos", 
				{ fecha_inicio: $("#fecha_inicio_preventivo").val(), fecha_fin: $("#fecha_fin_preventivo").val()  }, 
				function(data){
					bodytable.empty();
					var x = 1;
					if($.isEmptyObject(data)){
						bodytable.append('<tr><td colspan="8"><p style="color:red;text-align:center;padding:0;margin:0;">No existen mantenimientos preventivos en este rango de fecha</p></td></tr>');
					}else{
						$.each(data, function(index,element) {
							bodytable.append('<tr><td>'+x+'</td><td>'+convertirFecha(element.fecha_realizacion)+'</td><td>'+element.num_activo+'</td><td>'+element.nombre+'</td><td>'+element.marca+'</td><td>'+element.modelo+'</td><td>'+element.serie+'</td><td>'+element.realizado_por+'</td><td>'+element.aprobado_por+'</td><td>'+element.costo_mantenimiento+'</td></tr>');
							x++;
						});
					}
			});	
		};

		$("#fecha_inicio_correctivo").change(function(){
		 	obtenerCorrectivos();	
		});
		
		$("#fecha_fin_correctivo").change(function(){
			obtenerCorrectivos();
		});

		//Funcion para obtener los mantenimientos correctivos dentro de un rango de fecha
		function obtenerCorrectivos(){
		 	var bodytable = $("#bodytable_correctivo");
			$.get(""+baseurl+"/obtenercorrectivos", 
				{ fecha_inicio: $("#fecha_inicio_correctivo").val(), fecha_fin: $("#fecha_fin_correctivo").val()  }, 
				function(data){
					bodytable.empty();
					var x = 1;
					if($.isEmptyObject(data)){
						bodytable.append('<tr><td colspan="8"><p style="color:red;text-align:center;padding:0;margin:0;">No existen mantenimientos correctivos en este rango de fecha</p></td></tr>');
					}else{
						$.each(data, function(index,element) {
							bodytable.append('<tr><td>'+x+'</td><td>'+convertirFecha(element.fecha_realizacion)+'</td><td>'+element.num_activo+'</td><td>'+element.nombre+'</td><td>'+element.marca+'</td><td>'+element.modelo+'</td><td>'+element.serie+'</td><td>'+element.realizado_por+'</td><td>'+element.aprobado_por+'</td><td>'+element.costo_mantenimiento+'</td></tr>');
							x++;
						});
					}
			});	
		};

});  

//Funcion para convertir las fechas obtenidas
function convertirFecha(fecha){
	var meses = new Array ("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	var f = new Date(fecha);
	var fecha_completa;

	fecha_completa = f.getDate() +' '+meses[f.getMonth()]+' '+f.getFullYear();
	return fecha_completa;
}

function validarced(sw){
		
		var ruta;
		var c = 0;
		if(sw == 1){
			ruta = 'validarced';
		}else{
			ruta = 'validarcedm';
		}
		var divParent = $('#errorCedula'); //obtiene el div padre del input
	    $.post(""+baseurl+"/"+ruta, 
            { ced: $('#cedula').val() }, 
            function(data){
                $.each(data, function(index,element) {                	
					if(c == 0){
						c = 1;
						divParent.addClass('has-error has-feedback');
						divParent.append("<span class='glyphicon glyphicon-remove form-control-feedback remove' aria-hidden='true' data-toggle='tooltip' data-placement='top' title='Cédula duplicada' onclick='clearInput();'></span> <span id='inputError' class='sr-only remove'>(error)</span>");
						$('.remove').tooltip();					
					}

            });
        });
        if (c == 0) {
				divParent.removeClass('has-error has-feedback');
				$('span.remove').remove(); 
        }
            
}  
function clearInput() {
	var divParent = $('#errorCedula');
 	$('#cedula').val('');
 	divParent.removeClass('has-error has-feedback');
	divParent.find('span.remove').remove();
	divParent.find('.tooltip').remove();
						
}
function Comparar(id, resultado){
	
	var mom = resultado;
	var campo = $('#alerta_'+id+'');
	campo.empty();
	var positivo = $('#positivo_'+id+'');
	var etiqueta = '<span class="label label-default">PorDefecto</span>';
	positivo.val('-2');
    /*$.get(""+baseurl+"/comparar", 
        { idmarcador: id , semana: $("#semana").val() }, 
        function(data){
			var valor = $('#valor_'+id+'').val();
            var campo = $('#alerta_'+id+'');
            var positivo = $('#positivo_'+id+'');
            var resultado = $('#pantalla_mom_'+id+'');
            var x = 0;
            //alert(resultado);
			campo.empty();
			var etiqueta = '<span class="label label-default">PorDefecto</span>';
			positivo.val('-2');
            $.each(data, function(index,element) {
				//Codigo para comparar en base a los limites almacenados en la base de datos
				//var x = 1;
                if(parseFloat(valor) < element.lim_inferior){
					etiqueta = '<span class="label label-danger">Inferior</span>';      
					positivo.val('-1');
				}
				if(parseFloat(valor) > element.lim_superior){
						etiqueta = '<span class="label label-warning">Superior</span>';
						positivo.val('1');
				}	
				if(parseFloat(valor) <= element.lim_superior && parseFloat(valor) >= element.lim_inferior){
						etiqueta = '<span class="label label-success">Normal</span>';
						positivo.val('0');
				}
            });*/
            
            //Cambio para trabajar en base a las mom y no para comparar con los limites almacenados en la base de datos.
          // if(x == 0){
				if(mom == 0){
					etiqueta = '<span class="label label-default">PorDefecto</span>';
					positivo.val('-2');
				}
				if(mom <=  0.55 && mom != 0){
					etiqueta = '<span class="label label-danger">Inferior</span>';      
					positivo.val('-1');
				}
				if(mom >= 2.5){
						etiqueta = '<span class="label label-warning">Superior</span>';
						positivo.val('1');
				}	
				if(mom > 0.55 && mom < 2.5){
						etiqueta = '<span class="label label-success">Normal</span>';
						positivo.val('0');
				}
			//}
            campo.append(etiqueta);
   //});
}
function Disable(){		
		var registro = document.getElementById('registros');
		if(registro.disabled == true){
			registro.disabled = false;
		}else{
			registro.disabled = true;
		}
}
//Funcion que recibe el id del marcador y busca en la base de datos para conocer la mediana de ese marcador y poder realizar el calculo de la mom
function Division(id, idraza){
	
    $.get(""+baseurl+"/calculo", 
        { idmarcador: id , semana: $("#semana").val() }, 
        function(data){
            var campo = $('#mom_'+id+'');
            var pantalla = $('#pantalla_mom_'+id+'');
			var resultado = 0;
			pantalla.empty();
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var mediana = element.mediana_marcador;
                resultado = (valor/mediana);
            }); 
            campo.val(resultado.toFixed(5));
			pantalla.append(resultado.toFixed(5));
			Comparar(id, resultado);
			//Llamado de la Funcion Correccion1 que calcula la correccion de las mom en base al peso
			Correccion_lineal(id, resultado);
			Correccion_exponencial(id, idraza, resultado);
			
    });
}
//Funcion que recibe el id que es el id del marcador y la mom para realizar los calculos de la correccion por peso Lineal
function Correccion_lineal(id, mom){
	
    $.get(""+baseurl+"/correccion_lineal", 
        { idmarcador: id }, 
        function(data){
            var campo = $('#corr_lineal_'+id+'');
            var pantalla = $('#pantalla_lineal_'+id+'');
            var lineal = 0.0000;
            pantalla.empty();
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var a = element.a;
                var b = element.b;
                var peso = $('#peso').val();
                lineal = mom/(parseFloat(a)+parseFloat(b/peso));
                //alert(b*peso);
            });
            campo.val(lineal.toFixed(5));
			pantalla.append(lineal.toFixed(5));
    });
}
//Funcion que recibe el id que es el id del marcador y la mom para realizar los calculos de la correccion por peso Exponencial
function Correccion_exponencial(id, idraza, mom){
	
    $.get(""+baseurl+"/correccion_exponencial", 
        { idmarcador: id , idraza: idraza}, 
        function(data){
            var campo = $('#corr_exp_'+id+'');
            var pantalla = $('#pantalla_exponencial_'+id+'');
            var exponencial = 0.0000;
            pantalla.empty();
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var a = element.a;
                var b = element.b;
                var peso = $('#peso').val();
                exponencial = mom/(Math.pow(10,(parseFloat(a)+parseFloat(b*peso))));
                //alert(b*peso);
            });
			campo.val(exponencial.toFixed(5));
			pantalla.append(exponencial.toFixed(5));
    });
}
