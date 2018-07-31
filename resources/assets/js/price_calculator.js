function calculateCost(){
	// y = 88x +19;
	let y = 0;
	let e = document.getElementById('academicLevel');	
	let x = e.options[e.selectedIndex].value;
	y = (88*x) + 19;
	document.getElementById('totalcost').innerHtml = "$"+y;
}