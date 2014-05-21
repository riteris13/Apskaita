jQuery(document).ready(function($){
	window.onload = function(){
		$("#Dol_val").trigger("change");
	};
	var sumaLT = [];
	var sumaDOL = [];
	var rinkos = [];
	var dol = 2.5031;
	var total = 0;
	$('#Dol_val').on('change', function(){
	dol = $(this).val();
			$('.ltl').each(function(index){
				sumaLT[index] = parseFloat($(this).val()) || 0;
				sumaDOL[index] = (sumaLT[index]/dol).toFixed(2);
				total += sumaLT[index];
			});
			$('#Total').val(total.toFixed(2));
			$('.dol').each(function(index){
				$(this).val(sumaDOL[index]);
			});
			$('.rinkos').each(function(index){
				$(this).val((100/total*sumaLT[index]).toFixed(2));
			});
			total = 0;
	})
	$('.ltl').on('change', function(){
		$("#Dol_val").trigger("change");
	})
});

/*pagal index grazina value	
		var i = 0;
		i = $('.ltl').index($(this));
		alert($('.ltl').eq(i).val());
		*/