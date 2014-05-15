$(document).ready(function(){
       $("#id_provincia").change(function(event){
         var id = $("#id_provincia").find(':selected').val();
         alert("PROVINCIA: " + id);
       }); 
});    
        
