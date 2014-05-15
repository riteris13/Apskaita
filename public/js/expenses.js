jQuery(document).ready(function($){ 
	$('.input-xs').change(function(){
	if(event.target.id == "total"){
		return;
	}
		var suma = 0;
			$('.input-xs').each(function(index){
				if (!$(this).val() || $(this).attr('id') == "total" 
					|| $(this).attr('id') == "data" || $(this).val() == "") {	
				}else{
					suma += parseFloat($(this).val());	
				}				
			});
		document.getElementById('total').value = suma.toFixed(2);
	})
});