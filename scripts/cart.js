// JavaScript Document
function deleteItem(thisItem) {
	var hereOrderID = "orderID" + thisItem;
	var hereProductID = "productID" + thisItem;
	var thisOrderID = document.getElementById(hereOrderID).value;
	var thisProductID = document.getElementById(hereProductID).value;
	
	window.location.href = "do_delete.php?orderid="+thisOrderID+"&productid="+thisProductID;
	return;
} 