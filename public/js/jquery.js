jQuery(document).ready(function($){
  	$('#category').change(function(){
			$.getJSON("apidropdown", 
				{ option: $(this).val() }, 
				function(data) {
					var product = $('#product');
					product.empty();
					if(data.length == 0){
						product.attr('disabled', 'disabled');
						product.append("<option>" + "Kategorija tuščia" + "</option>");
					}
					else{
						product.removeAttr('disabled');
						$.each(data, function(index, element) {
							product.append("<option value='"+ element.id +"'>" + element.pavadinimas + "</option>");
						});
					}
				});
		});
	})  