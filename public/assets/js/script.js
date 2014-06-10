jQuery(document).ready(function($){	
        //Variables  y Funciones para la vista previa y carga de Fotos
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        closebtn.attr("onclick","closePreview();");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>Vista Previa</strong>"+$(closebtn)[0].outerHTML,
            content: 'Cargando...',
            placement:'bottom'
        });
        // Set the clear onclick function
        $('.image-preview-clear').click(function(){
            $('.image-preview').popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text(""); 
        });  	
        $(function() {
            $(".image-preview-input input:file").change(function (){
                // Create the preview image 
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:250,
                    height:350
                });      
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);            
                    // Set preview image into the popover data-content
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                }        
                reader.readAsDataURL(file);
            });  
        });

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
function closePreview(){
    $('.image-preview').popover('hide'); 
    // Need to improve the onhover event from here
    //$('.image-preview').hover(
    //    function () {
    //       $('.image-preview').popover('show');
    //    }, 
    //     function () {
    //       $('.image-preview').popover('hide');
    //    }
    //);      
}
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
