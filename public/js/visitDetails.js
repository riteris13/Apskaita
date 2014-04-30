function getVisitDetails(id){
	$.getJSON(window.location.protocol + "//" + window.location.host + "/" + 'visit/details', 
		{option: id}, function(data) {	
			$('#modal-body').empty();
			$.each(data, function(index, element) {
				$('#modal-body').append(
					'<h4>' + "Pokalbis" + '</h4>' +
					'<p>' + element.pokalbis + '</p>' +
					'<h4>' + "Kompetitoriai" + '</h4>' +
					'<p>' + element.kompetitoriai + '</p>' 
				);
			});
		});	
}