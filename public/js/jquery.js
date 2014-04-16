jQuery(document).ready(function($){  	
	$('#category').change(function(){
		$.getJSON("apidropdown", {option: $(this).val() }, 
			function(data) {
				var product = $('#produktas');
				product.empty();
			if(data.length == 0){
				product.attr('disabled', 'disabled');
				product.append("<option>" + "Kategorija tuščia" 
					+ "</option>");
			}
			else{
				product.append("<option selected disabled>" 
					+ "Pasirinkite produktą" + "</option>");
				product.removeAttr('disabled');
				$.each(data, function(index, element) {
					product.append("<option value='"+ element.id +"'>" 
					+ element.pavadinimas + "</option>");
				});
			}
		});
	});
	
	$('#produktas').live('change', function(){
		var priceField = $("#kaina");
		var discountField = $("#nuolaida");
		$.getJSON("price", {option: $(this).val() }, 
		function(data) {
			$.each(data, function(index, element){ 
				priceField.val(element.kaina)
			});
		});
	});
	
	$('#daktaras').live('change', function(){
		var discountField = $("#nuolaida");
		$.getJSON("discount", {option: $(this).val() }, 
		function(data) {
			$.each(data, function(index, element){ 
				discountField.val(element.nuolaida)
			});
		});
	});
	
	$('#klinika').change(function(){
		$.getJSON("apidropdown2", {option: $(this).val() }, 
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