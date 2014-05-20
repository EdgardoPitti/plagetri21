jQuery(document).ready(function($){		
        $("#id_provincia").change(function(){
            $.get("http://localhost/plagetri21/public/dinamico/distrito", 
            { provincia: $(this).val() }, 
        	function(data){
				var campo = $('#id_distrito');
				campo.empty();
				var campo1 = $('#id_corregimiento');
				campo1.empty();
				$.each(data, function(index,element) {
					campo.append("<option value='"+ element.id_distrito +"'>" + element.distrito + "</option>");
        		});
        	});
        });     

     	$("#id_distrito").change(function(){
            $.get("http://localhost/plagetri21/public/dinamico/corregimiento", 
            { distrito: $(this).val() }, 
        	function(data){
				var campo = $('#id_corregimiento');
				campo.empty();
				$.each(data, function(index,element) {
					campo.append("<option value='"+ element.id_corregimiento +"'>" + element.corregimiento + "</option>");
        		});
        	});
        });
});    
        
