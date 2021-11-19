 //JavaScript Document

var errors = false;

function displayThis(theForm){
	//alert("You clicked submit");
	alert(document.title.value);	
}	

var thisIsTheWindow = "";

function thisWindow(thisFile) {
	if(thisIsTheWindow) {
		thisIsTheWindow.close();
	}

	var myWindow = window.open("thisFile", "thisWindow");

	
	return;
	}
	
function showFormDetailsById(thisForm) {
	var showThisForm = "You have ordered the follow items\n\n";
	
	showThisForm += "Title: " ;
	showThisForm += thisForm.title.value + "\n";
	showThisForm += "Quantity: " ;
	showThisForm += thisForm.quantity.value + "\n";
	showThisForm += "Price: " ;
	showThisForm += thisForm.price.value + "\n";
	showThisForm += "Total Price: " ;
	showThisForm += thisForm.totalPrice.value + "\n";

	showThisForm += "\nIs this correct?";
	
	//var getUserResponse = comfirm(showThisForm);
	//return getUserResponse;
	return confirm(showThisForm);
	
}

var errors = false;

function checkOrder(theQty){

	//alert ("You click the Calculate Total button");
	var errorMsge = "";
	var getTotal = "";
	//var isItNum = isNan(theQty);
	
	//alert(isItNum);
	if(isNaN(theQty)){
		errors = true;
		errorMsge += "Quantity must be a number!\n";
	}
	
	if(theQty == null || theQty == "" || theQty == " " ){
		errors = true;
		errorMsge += "Quantity cannot be blank!\n";
	}

	else if(theQty == 0 ){
		errors = true;
		errorMsge += "Quantity cannot be zero!\n";
	}
	
	else if(theQty < 0 ){
		errors = true;
		errorMsge += "Quantity cannot be negative!\n";
	}

	else{
		errors = false;
	}
	
	if(errors){
		alert(errorMsge);
	}
	
	else{
		getTotal = theQty * document.getElementById("price").value;
		document.getElementById("totalPrice").value = getTotal;
	}
	
	return errors;
}

function confirmOrder(thisForm){
	var confirmThis = false;

	if(errors){
		alert("Please fix the errors");
	}
	else{
		confirmThis = showFormDetailsById(thisForm);
	}
	
	return confirmThis;
}

function cancelOrder(thisForm){
	var retVal = confirm(thisForm);
	if (retVal == true) {
		return true;
	}
	else {
	return clearResults();
	}
}

function clearResults() {
	document.getElementById("quantity").value = "";
	document.getElementById("totalPrice").value = "";
}






