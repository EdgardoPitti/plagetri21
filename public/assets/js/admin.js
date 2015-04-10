function eliminar(id) {		
		   var form = $('#form-delete');
         var action = form.attr('action').replace('USER_ID', id);
         var row =  $(this).parents('tr');
         
         row.fadeOut(1000);
         
         $.post(action, form.serialize(), function(result) {
            if (result.success) {
            	$("#table-paciente").bootstrapTable('refresh');	
            	$("#table-medico").bootstrapTable('refresh');                         
            } else {
               row.show();
            }
         }, 'json');      
}