function getDetails(id){
var bendraSuma = 0;
	$.getJSON(window.location.protocol + "//" + window.location.host + "/" + 'order/details', {option: id}, 
			function(data) {	
			$('#modalTable').empty();
			$.each(data, function(index, element) {
			var suma = element.pir_kaina * element.kiekis;
			bendraSuma += suma;
				if(element.statusas == 0){
					$('#modalTable').append(
					'<tr>' + 
						'<td>' + element.produktas + '</td>' +
						'<td>' + element.pir_kaina + '</td>' + 
						'<td>' + element.kiekis + '</td>' + 
						'<td>' + suma.toFixed(2) + '</td>' +				
						'<td>' +		
							'<a class="btn btn-xs btn-danger" href="/order/removeitem/' + element.id + '">' +
							'<span class="glyphicon glyphicon-trash" ' + 
							'title="Pašalinti">' + '</span>' + '</a>' + '</td>' +
					'</tr>');
				}else{
					$('#modalTable').append(
					'<tr>' + 
						'<td>' + element.produktas + '</td>' +
						'<td>' + element.pir_kaina + '</td>' + 
						'<td>' + element.kiekis + '</td>' + 
						'<td>' + suma.toFixed(2) + '</td>' +
						'</tr>');						
				}
			});
			document.getElementById('bendra_suma').innerHTML =  "Bendra pardavimo suma: " + bendraSuma.toFixed(2) + " LTL";
		});	
		
}