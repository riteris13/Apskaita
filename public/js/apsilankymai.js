jQuery(document).ready(function($){ 
	window.onload = function(){
		var clinic = $("#klinika");
		clinic.trigger("change")
	};
	$('#klinika').change(function(){
		if($(this).val() == "default"){
			return;
		}
		$.getJSON("apidropdown", {option: $(this).val() }, 
		function(data){
				var doctor = $('#daktaras');
				doctor.empty();
			if(data.length == 0){
				doctor.attr('disabled', 'disabled');
				doctor.append("<option>" + "Klinika neturi gydytojų" + "</option>");
			}
			else{
				doctor.append("<option selected disabled>" 
					+ "Pasirinkite gydytoją" + "</option>");
				doctor.removeAttr('disabled');
				$.each(data, function(index, element) {
					doctor.append("<option value='"+ element.id +"'>" 
					+ element.vardas + " " + element.pavarde 
					+ "</option>");
				});
			}
		});
	});
})	