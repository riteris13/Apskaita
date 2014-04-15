jQuery(document).ready(function($){
  	$('#category').change(function(){
			$.getJSON("apidropdown", 
				{ option: $(this).val() }, 
				function(data) {
					var product = $('#product');
					product.empty();
					$.each(data, function(index, element) {
			            product.append("<option value='"+ element.id +"'>" + element.pavadinimas + "</option>");
			        });
				});
		});
	})  