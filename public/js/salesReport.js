jQuery(document).ready(function($){
	window.onload = function(){
		$("#Dol_val").trigger("change");
	};
	var sumaLT = 0;
	var sumaDOL = [];
	var rinkos = [];
	var dol = 2.5031;
	var total = 0;
	$('#Dol_val').on('change', function(){
	dol = $(this).val();
	total = $('#Total').val();
			$('.ltl').each(function(index){
				sumaLT = parseFloat($(this).val()) || 0;
				sumaDOL[index] = (sumaLT/dol).toFixed(2);
				rinkos[index] = (100/total*sumaLT).toFixed(2);
			});
			$('.dol').each(function(index){
				$(this).val(sumaDOL[index]);
			});
			$('.rinkos').each(function(index){
				$(this).val(rinkos[index]);
			});				
	})
	$('#ltl').on('change', function(){
		alert("k");
	})
});