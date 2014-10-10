(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this), search = $this.val().toLowerCase(), target = $this.attr('data-filters'), $target = $(target), $rows = $target.find('tbody tr');
					if(search == '') {
						$rows.show(); 
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<div class="filterTable_no_results" style="color:red; width:100%;">No se encuentran Datos.</div>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
	$('[data-action="filter"]').filterTable();
	
	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this), 
				$panel = $this.parents('.panel');
		
		$panel.find('.panel-body').slideToggle();
		if($this.css('display') != 'block') {
			$panel.find('.panel-body').show();
		}
	});
	$('[data-toggle="tooltip"]').tooltip();
});

function obtener(id){
    var host = window.location.host;      
	$.get("http://"+host+"/plagetri21/public/medicos/getmedicos",            
	  { medico: id }, 
	  function(data){
	    var foto = $('#foto');
	    foto.empty();

	    foto.append('<img alt="Medico" src="http://'+host+'/plagetri21/public/imgs/'+data.foto+'" class="img-rounded" style="width:80px;"> ');
	    $('#medico').html(data.first_name+' '+data.second_name+' '+data.last_name+' '+data.last_sec_name);
	    $('#ext').html(data.extension);	    
	    $('#esp').html(data.especiality);
	    $('#lvl').html(data.level);
	    $('#loc').html(data.ubicacion);
	     $('#obs').html(data.observacion);
  	});
}

jQuery(document).ready(function ($) {
  $('#scrollbar').perfectScrollbar();
  $('#scrollbar2').perfectScrollbar();
  $('#scrollbar3').perfectScrollbar();
  $('#scrollbar4').perfectScrollbar();	  
});
$(document).ready(function() {
 $('#dev-table').fixedHeaderTable();
 $('#citas').fixedHeaderTable();
 $('#tabla-citas').fixedHeaderTable();
 $('#mediana-marcadores').fixedHeaderTable();
 $('#list-act').fixedHeaderTable();
 $('#tabla-mantenimientos').fixedHeaderTable();
});