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

});    
//Funcion pque recibe el id del marcador y busca en la base de datos para conocer la mediana de ese marcador y poder realizar el calculo de la mom
function Division(id, idraza){
    $.get("http://localhost/plagetri21/public/calculo", 
        { idmarcador: id }, 
        function(data){
            var campo = $('#mom_'+id+'');
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var mediana = element.mediana_marcador;
                var resultado = valor/mediana;
                campo.val(resultado);
                Correccion1(id, idraza, resultado);
            });
    });
}
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

                campo.val(resultado);
                campo1.val(resultado1);
            });
    });
}
