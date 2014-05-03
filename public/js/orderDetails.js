var uzs = 0;
var nuolD = 0;
var sta = 0;
function getDetails(id){
var bendraSuma = 0;
	$.getJSON(window.location.protocol + "//" + window.location.host + "/" + 'order/details', {option: id}, 
			function(data) {	
			$('#modalTable').empty();
			$.each(data, function(index, element) {
			var suma = element.pir_kaina * element.kiekis;
			bendraSuma += suma;
				if(element.statusas == 0){
				$("button[name='papildyti-btn']").attr('class', 'btn btn-sm btn-primary');
					$('#modalTable').append(
					'<tr>' + 
						'<td>' + element.produktas + '</td>' +
						'<td>' + element.pir_kaina + '</td>' + 
						'<td>' + element.kiekis + '</td>' + 
						'<td>' + suma.toFixed(2) + '</td>' +				
						'<td>' +		
							'<a onClick="return confirm(\'Ar tikrai norite pašalinti ' + 
							element.produktas + ' iš užsakymo?\')" class="btn btn-xs btn-danger"' + 
							'href="/order/removeitem/' + element.id + '">' +
							'<span class="glyphicon glyphicon-trash" ' + 
							'title="Pašalinti">' + '</span>' + '</a>' + '</td>' +
					'</tr>');
				}else{
				$("button[name='papildyti-btn']").attr('class', 'btn btn-sm btn-primary disabled');
					$('#modalTable').append(
					'<tr>' + 
						'<td>' + element.produktas + '</td>' +
						'<td>' + element.pir_kaina + '</td>' + 
						'<td>' + element.kiekis + '</td>' + 
						'<td>' + suma.toFixed(2) + '</td>' +
						'</tr>');						
				}
			uzs = element.uzsakymai_id;
			nuolD = element.nuolaida;
			sta = element.statusas;
			});
			document.getElementById('bendra_suma').innerHTML =  "Bendra pardavimo suma: " + bendraSuma.toFixed(2) + " LTL";
			
	})
}
jQuery(document).ready(function($){ 
	$("button[name='papildyti-btn']").click(function() {
		window.location='/order/add2/' + uzs + '/' + nuolD;	
	});
		
});