$(document).ready(function(){
      /* $("#id_provincia").change(function(event){
         var id = $("#id_provincia").find(':selected').val();
         alert("PROVINCIA: " + id);
       }); */
		/*$("#id_provincia").change(function(event){
			//var id = $("#id_provincia").find(':selected').val();
			var id = $(this).val();
			var district = $("#id_distrito");
			 district.empty();
			var texto = 'mayor';
			if( id < 5 ){
				texto = 'menor';
			}
			district.append("<option value='" + id + "'>" + texto + "</option>");
			$("#id_distrito").load('cargar_distrito.blade.php');
		});*/
        $("#id_provincia").change(function(){
            $.get("{{ url('dropdown') }}", 
            { option: $(this).val() },
            function(data) {
            var distrito = $('#id_distrito');
            alert("assa");
            distrito.empty();
            $.each(data, function(index,element) {
                distrito.append("<option value='"+ element.id_distrito +"'>" + element.distrito + "</option>");
            });
            });
        });
		$("#id_distrito").click(function(event){
			var id = $("#id_distrito").find(':selected').val();
			
			
		});	
});    
        
