function eliminar(id) {		
		   var form = $('#form-delete');
         var action = form.attr('action').replace('USER_ID', id);
         var row =  $(this).parents('tr');
         var host = window.location.host;            	
         row.fadeOut(1000);
         
         $.post(action, form.serialize(), function(result) {
            if (result.success) {
            	var ruta = "http://"+host+"/plagetri21/public/"+result.route;	            	
            	window.location.replace(ruta);                         
            } else {
               row.show();
            }
         }, 'json');      
}