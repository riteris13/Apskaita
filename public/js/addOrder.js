jQuery(document).ready(function($){ 
$("select[id='klinika'] :not(option:gt(0))").attr("disabled", "disabled");
$("select[id='category'] :not(option:gt(0))").attr("disabled", "disabled");
	window.onload = function(){
		var clinic = $("#klinika").trigger("change");
		var category = $("#category").trigger("change");
	};

	$('#category').change(function(){
	if($(this).val() == "default"){
		return;
	}
			$.getJSON("apidropdown", {option: $(this).val() }, 
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
var proDisc; //produkto nuolaida
var docDisc; //daktaro nuolaida
	$('#produktas').live('change', function(){
		var priceField = $("#kaina");
		var priceDiscount = $("#nuolaidaP");
		$.getJSON("pricediscount", {option: $(this).val() }, 
		function(data) {
			$.each(data, function(index, element){ 
				priceField.val(element.kaina)
				priceDiscount.attr('checked', false);
				if(element.nuolaida === null){
					proDisc = 0;
					priceDiscount.val(0);
					document.getElementById('nuolPtext').innerHTML =  " Produktui: 0%" ;
				}else{
					proDisc = element.nuolaida;
					priceDiscount.val(proDisc)
					document.getElementById('nuolPtext').innerHTML =  
							" Produktui: " + proDisc + "%";
				}
				priceField.trigger("change")
			});
		});
	});
	
var discount = $("#nuolaida");	
	$('#nuolaidaP').live('click', function(){
			discount.val(proDisc);
			discount.trigger("change");
	});
	
	$('#nuolaidaD').live('click', function(){
			discount.val(docDisc);
			discount.trigger("change");
	});
	
	
	$('#daktaras').live('change', function(){
		var doctorDiscount = $("#nuolaidaD");
		if(window.location.pathname.indexOf("visit") >= 0){
			return;
		}
		$.getJSON("discount", {option: $(this).val() }, 
		function(data) {	
			$.each(data, function(index, element){
				doctorDiscount.attr('checked', false); 			
				if(element.nuolaida === null){
					docDisc = 0;
					doctorDiscount.val(0);
					document.getElementById('nuolDtext').innerHTML =  " Daktarui: 0%" ;
				}else{
						docDisc = element.nuolaida;
						doctorDiscount.val(docDisc);
						document.getElementById('nuolDtext').innerHTML =  
							" Daktarui: " + docDisc + "%";
					}
					});				
		});
	});
	
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

var theForm = document.forms["addOrder"];
function getPrice(){
    var theForm = document.forms["addOrder"];
    var price = theForm.elements["kaina"];
    var kaina = 0;
    if(price.value!="")
    {
        kaina = parseFloat(price.value);
    }
return kaina;
}

function getDiscount(){
    var theForm = document.forms["addOrder"];
    var discount = theForm.elements["nuolaida"];
    var size = 0;
    if(discount.value!="")
    {
        size = parseFloat(discount.value);
    }
return size;
}

function getQuantity(){
    var theForm = document.forms["addOrder"];
    var quantity = theForm.elements["kiekis"];
    var amount = 1;
    if(quantity.value!="")
    {
        amount = parseInt(quantity.value);
    }
return amount;
}

function calculatePrice(){
	var size = getDiscount();
    var kaina = getPrice() ;
	var pir_kaina = kaina * (1-size*0.01);
    document.getElementById('pir_kaina').innerHTML =  "Vieneto pardavimo kaina: " + pir_kaina.toFixed(2);
}

function calculateTotal(){
	var size = getDiscount();
    var kaina = getPrice() 
	var single = kaina * (1-size*0.01);
	var quantity = getQuantity();
	var total = single*quantity;
	document.getElementById('bendra_suma').innerHTML =  "Bendra pardavimo suma: " + total.toFixed(2);
}