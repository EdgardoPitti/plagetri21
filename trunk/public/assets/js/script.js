$(document).ready(function(){
      /* $("#id_provincia").change(function(event){
         var id = $("#id_provincia").find(':selected').val();
         alert("PROVINCIA: " + id);
       }); */
		$("#id_provincia").change(function(event){
			var id = $("#id_provincia").find(':selected').val();
			
			$("#id_distrito").append("<option value="">" + id + "</option>");
		});
		$("#id_distrito").change(function(event){
			var id = $("#id_distrito").find(':selected').val();
		});	
});    
        
