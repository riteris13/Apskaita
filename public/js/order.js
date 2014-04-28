/*
$(document).ready(function(){
 $('#aprasymas-btn').click(function(){	
 alert($(this).data('id'));
		$.getJSON("details", {option: $(this).data('id')}, 
			function(data) {
			$.each(data, function(index, element) {
					document.getElementById('modal-body').innerHTML =  element.pavadinimas;
			});
		});
	});
})
*/
function getDetails(id){

	$.getJSON("order/details", {option: id}, 
			function(data) {
			document.getElementById('modal-body').innerHTML = "";
			$.each(data, function(index, element) {
					document.getElementById('modal-body').innerHTML +=  "Produktas: " + 
						element.produktas_id + " Kaina: " + element.pir_kaina + 
						" Kiekis: " + element.kiekis + "<br>";
			});

		});
	
}