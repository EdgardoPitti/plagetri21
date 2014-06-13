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
            var campo = $('#mom_corr1_'+id+'');
            $.each(data, function(index,element) {
                var valor = $('#valor_'+id+'').val();
                var a = element.a;
                var b = element.b;
                var peso = $('#peso').val();
                var resultado = mom/(a+(b/peso));
                
                campo.val(resultado);
            });
    });
}
function CambioMediana(id){
    $.get("http://localhost/plagetri21/public/obtener_mediana", 
        { id: id }, 
        function(data){
            var campo = $('#mediana_'+id+'');
            var button = $('#button_'+id+'');
            campo.empty();
            button.empty();
            $.each(data, function(index,element){
                campo.append("<input class='form-control' id='valor_"+id+"' name='valor_"+id+"' type='text' value='"+element.mediana_marcador+"'>");
                button.append("<button type='submit' class='btn btn-danger btn-sm' title='Cerrar' onClick='Cancelar("+id+")' style='margin-bottom:3px;'><span class='glyphicon glyphicon-remove'></span> Cerrar</button> <button type='submit' class='btn btn-success btn-sm' title='Salvar Mediana' onClick='SalvarMediana("+id+")'><span class='glyphicon glyphicon-floppy-disk'></span> Guardar</button>")
            });
    });
}
function Cancelar(id){
    $.get("http://localhost/plagetri21/public/obtener_mediana", 
        { id: id }, 
        function(data){
            var campo = $('#mediana_'+id+'');
            var button = $('#button_'+id+'');
            campo.empty();
            button.empty();
            $.each(data, function(index,element){
                campo.append("<input class='form-control' id='valor_"+id+"' name='valor_"+id+"' type='text' value='"+element.mediana_marcador+"' readonly>");
                button.append("<button type='submit' class='btn btn-primary btn-sm' title='Editar Mediana' onClick='CambioMediana("+id+")'><span class='glyphicon glyphicon-pencil'></span> Editar</button>");
            });
    });    
}
function SalvarMediana(id){
    $.get("http://localhost/plagetri21/public/salvar_mediana", 
        { id: id }, 
        function(data){
            var campo = $('#mediana_'+id+'');
            var button = $('#button_'+id+'');
            campo.empty();
            button.empty();
            $.each(data, function(index,element){
                campo.append("<input class='form-control' id='valor_"+id+"' name='valor_"+id+"' type='text' value='"+element.mediana_marcador+"' readonly>");
                button.append("<button type='submit' class='btn btn-primary' onClick='CambioMediana("+id+")' title='Editar'><span class='glyphicon glyphicon-pencil'></span> Editar</button>")
            });
    });

}
