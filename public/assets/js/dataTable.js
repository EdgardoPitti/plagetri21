$(function () {
	
	$("#table-medico").bootstrapTable({
		height: 415,
		url: baseurl+'/medicos',
		search: true,
		sidePagination: 'server',
		pagination: true
	});
	$("#table-paciente").bootstrapTable({
		height: 380,
		url: baseurl+'/pacientes/0',
		search: true,
		sidePagination: 'server',
		pagination: true
	}); 
    $("#table-cita").bootstrapTable({
        height: 380,
        url: baseurl+'/pacientes/1',
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
		height: 300,
		url: baseurl+'/getactivos/0',
		search: true,
		sidePagination: 'server',
		pagination: true
	});
    $('#table-mantenimiento').bootstrapTable({
		height: 300,
		url: baseurl+'/getactivos/1',
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