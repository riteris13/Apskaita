jQuery(document).ready(function($){
	window.onload = function(){
		$("#Dol_val").trigger("change");
	};
	var sumaLT = 0;
	var sumaDOL = [];
	var dol = 2.5031;
	$('#Dol_val').on('change', function(){
	dol = $(this).val();
			$('.ltl').each(function(index){
				sumaLT = parseFloat($(this).val());
				sumaDOL[index] = (sumaLT/dol).toFixed(2);
			});
			$('.dol').each(function(index){
				$(this).val(sumaDOL[index]);
			});						
		//document.getElementById('total').value = suma.toFixed(2);
	})
});

/*
function calculateTotal(bSuma, tarpSum){
		for(j=1; j<=tarpSum.length-1; j++){
			myTable = document.getElementById('tblSales');
			myTable.rows[j].cells[4].innerHTML = (100/bSuma*tarpSum[j]).toFixed(2) + "%";
		}
}*/