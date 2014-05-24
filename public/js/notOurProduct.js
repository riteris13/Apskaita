jQuery(document).ready(function($){ 
	$('#category').change(function(){
	if($(this).val() == "default" || $(this).val() == null){
		return;
	}
			$.getJSON(window.location.protocol + "//" + window.location.host + "/" + "order/apidropdown", {option: $(this).val() }, 
				function(data) {
				var product = $('#produktas');	
				product.empty();				
				if(data.length == 0){
					product.attr('disabled', 'disabled');
					product.append("<option>" + "Kategorija tuščia" 
						+ "</option>");
				}else{
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
	$('#produktas').on('change', function(){
		document.getElementById('Submit').disabled = false;
	});
});

					