function calculateTotal(bSuma, tarpSum){
		for(j=1; j<=tarpSum.length-1; j++){
			myTable = document.getElementById('tblSales');
			myTable.rows[j].cells[4].innerHTML = (100/bSuma*tarpSum[j]).toFixed(2) + "%";
		}
}