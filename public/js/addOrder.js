jQuery(document).ready(function($){ 
$("select[id='klinika'] :not(option:gt(0))").attr("disabled", "disabled");
	window.onload = function(){
		var clinic = $("#klinika").trigger("change");
	};
	$('#klinika').change(function(){
	if($(this).val() == "default"){
		return;
	}
			$.getJSON("apidropdownclient", {option: $(this).val() }, 
			function(data){
					var doctor = $('#daktaras');
					doctor.empty();
				if(data.length == 0){
					doctor.attr('disabled', 'disabled');
					doctor.append("<option>" + "Klinika neturi gydytojų" + "</option>");
				}else{
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