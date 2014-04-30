function getDoctorDetails(id){
	$.getJSON(window.location.protocol + "//" + window.location.host + "/" + 'doctor/details', 
		{option: id}, function(data) {	
			$('#modal-body').empty();
			$.each(data, function(index, element) {
				$('#modal-body').append(
					'<h4>' + "Detalės" + '</h4>' +
					'<p>' + element.detales + '</p>' +
					'<h4>' + "Kodel neperka" + '</h4>' +
					'<p>' + element.kodel_neperka + '</p>' +
					'<h4>' + "Kaip pritraukti" + '</h4>' +
					'<p>' + element.kaip_pritraukti + '</p>'					
				);
			});
		});	
}