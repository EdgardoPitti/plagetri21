$(function () {
 		var host = window.location.host; 
	
  			$("#table-medico").bootstrapTable({
  				height: 415,
  				url: 'http://'+host+'/plagetri21/public/medicos',
  				search: true,
  				sidePagination: 'server',
  				pagination: true
  			});
  			$("#table-paciente").bootstrapTable({
  				height: 380,
  				url: 'http://'+host+'/plagetri21/public/pacientes/0',
  				search: true,
  				sidePagination: 'server',
  				pagination: true
  			});	
  			$("#table-cita").bootstrapTable({
  				height: 380,
  				url: 'http://'+host+'/plagetri21/public/pacientes/1',
  				search: true,
  				sidePagination: 'server',
  				pagination: true
  			});	
		  $('.cita-anterior').bootstrapTable({
		    height: 150
		  });
  			$("#mediana-marcadores").bootstrapTable({
  				height: 250
  			});
  			$(".modulo").bootstrapTable({
  				height: 195
  			});			
  			$("#config").bootstrapTable({
  				height: 250
  			});			
		  $('.agenda').bootstrapTable({
		    height: 180
		  });
		  $('#table-activo').bootstrapTable({
		    height: 415,
        url: 'http://'+host+'/plagetri21/public/getactivos',
        search: true,
        sidePagination: 'server',
        pagination: true
		  });
		  $('.list-act').bootstrapTable({
		    height: 150
		  });
		  $('.mantenimientos').bootstrapTable({
		    height: 180
		  });
});