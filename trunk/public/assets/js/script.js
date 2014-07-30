jQuery(document).ready(function($){	
        //Funcion que carga al cambiar el id_provincia
        $("#id_provincia").change(function(){
            //Funcion GET como primer parametro recibe el url que queremos ejecutar.
            $.get("http://localhost/plagetri21/public/distrito", 
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
            $.get("http://localhost/plagetri21/public/corregimiento", 
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
            $.get("http://localhost/plagetri21/public/distrito", 
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
            $.get("http://localhost/plagetri21/public/corregimiento", 
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
            $.get("http://localhost/plagetri21/public/institucion", 
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
            $.get("http://localhost/plagetri21/public/institucionprovincia", 
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
        //Funcion que al cambiar la semana este carga el valor automatico de la mediana del marcador correspondiente
        $("#semana").change(function(){
            $.get("http://localhost/plagetri21/public/obtenermediana", 
            { semana: $("#semana").find(':selected').val(), marcador: $("#marcador").find(':selected').val() }, 
            function(data){
                var campo = $('#mediana');
                var valor = 0;
                $.each(data, function(index,element) {
                    valor = element.mediana_marcador;
                });
                campo.val(valor);
            });
        });
        //Funcion que al cambiar el marcadir este carga el valor automatico de la mediana del marcador correspondiente
         $("#marcador").change(function(){
            $.get("http://localhost/plagetri21/public/obtenermediana", 
            { marcador: $("#marcador").find(':selected').val(), semana: $("#semana").find(':selected').val() }, 
            function(data){
                var campo = $('#mediana');
                var valor = 0;
                $.each(data, function(index,element) {
                    valor = element.mediana_marcador;
                });
                campo.val(valor);
            });
        });
         //Funcion calcular la edad exacta con respecto a la cita
         $("#fecha_cita").change(function(){
            var riesgo_pantalla = $("#riesgo_pantalla");
            var valor = $("#riesgo");
            riesgo_pantalla.empty();
            var fecha = $("#fecha_cita").val();
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
            var probabilidad = parseFloat(0.000627) + parseFloat(Math.exp(parseFloat(-16.2395) + parseFloat((0.286 * (edad - 0.5)))));
            var riesgo = (1/(1-probabilidad))/probabilidad;
            valor.val(riesgo.toFixed(2));
            riesgo_pantalla.append("1/"+riesgo.toFixed(2)+"");
        });
        //Funcion para el calculo de las semanas de gestacion
        $("#fur").change(function(){
            var semana = $("#semana");
            var date1 = $("#fur").val();
            var date2 = $("#fecha_cita").val();
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
        });


});    
//Funcion pque recibe el id del marcador y busca en la base de datos para conocer la mediana de ese marcador y poder realizar el calculo de la mom
function Division(id, idraza){
    $.get("http://localhost/plagetri21/public/calculo", 
        { idmarcador: id , semana: $("#semana").val() }, 
        function(data){
            var campo = $('#mom_'+id+'');
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var mediana = element.mediana_marcador;
                var resultado = valor/mediana;
                campo.val(resultado);
                //Llamado de la Funcion Correccion1 que calcula la correccion de las mom en base al peso
                Correccion1(id, idraza, resultado);
            });
    });
}
//Funcion que recibe el id que es el id del marcador, el id de la raza y la mom para realizar los calculos de la correccion
function Correccion1(id, idraza, mom){
    $.get("http://localhost/plagetri21/public/correccion1", 
        { idmarcador: id, idraza: idraza }, 
        function(data){
            var campo = $('#corr_lineal_'+id+'');
            var campo1 = $('#corr_exp_'+id+'');
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var a = element.a;
                var b = element.b;
                var peso = $('#peso').val();
                var resultado = mom/(a+(b/peso));
                var resultado1 = mom/(Math.pow(10,(a+(b*peso))));
                alert("Valor de a:"+a+" Valor de b:"+b);
                campo.val(resultado);
                campo1.val(resultado1);
            });
    });
}
