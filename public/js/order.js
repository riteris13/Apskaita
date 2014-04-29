function getDetails(id){
var bendraSuma = 0;
	$.getJSON("order/details", {option: id}, 
			function(data) {	
			$('#modalTable').empty();
			$.each(data, function(index, element) {
			var suma = element.pir_kaina * element.kiekis;
			bendraSuma += suma;
				$('#modalTable').append(
				'<tr>' + 
					'<td>' + element.produktas + '</td>' +
					'<td>' + element.pir_kaina + '</td>' + 
					'<td>' + element.kiekis + '</td>' + 
					'<td>' + suma.toFixed(2) + '</td>' + 
				'</tr>');
			});
			document.getElementById('bendra_suma').innerHTML =  "Bendra pardavimo suma: " + bendraSuma.toFixed(2) + " LTL";
		});	
}