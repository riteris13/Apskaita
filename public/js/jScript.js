var theForm = document.forms["addOrder"];

function getPrice(){
    //Assume form with id="addOrder"
    var theForm = document.forms["addOrder"];
    //Get a reference to the TextBox
    var price = theForm.elements["kaina"];
    var kaina = 0;
    //If the textbox is not blank
    if(price.value!="")
    {
        kaina = parseFloat(price.value);
    }
return kaina;
}

function getDiscount(){
    //Assume form with id="addOrder"
    var theForm = document.forms["addOrder"];
    //Get a reference to the TextBox
    var discount = theForm.elements["nuolaida"];
    var size = 0;
    //If the textbox is not blank
    if(discount.value!="")
    {
        size = parseFloat(discount.value);
    }
return size;
}

function getQuantity(){
    //Assume form with id="addOrder"
    var theForm = document.forms["addOrder"];
    //Get a reference to the TextBox
    var quantity = theForm.elements["kiekis"];
    var amount = 1;
    //If the textbox is not blank
    if(quantity.value!="")
    {
        amount = parseInt(quantity.value);
    }
return amount;
}

function calculatePrice(){
    //Here we get the total price by calling our function
    //Each function returns a number so by calling them we add the values they return together
	var size = getDiscount();
    var kaina = getPrice() ;
	var pir_kaina = kaina * (1-size*0.01);
    //display the result
	//neredaguojam laukui
    document.getElementById('pir_kaina').innerHTML =  "Vieneto pardavimo kaina: " + pir_kaina.toFixed(2);
	//redaguojamam laukui
	//document.getElementById('pir_kaina').value = Math.round(pir_kaina * 100) / 100;
	//Bendrai sumai 
}

function calculateTotal(){
	var size = getDiscount();
    var kaina = getPrice() 
	var single = kaina * (1-size*0.01);
	var quantity = getQuantity();
	var total = single*quantity;
	document.getElementById('bendra_suma').innerHTML =  "Bendra pardavimo suma: " + total.toFixed(2);
}