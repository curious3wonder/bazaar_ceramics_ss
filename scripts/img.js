//get query string values
const queryString = window.location.search;
const urlParam = new URLSearchParams(queryString);
const thisPrice = urlParam.get("price");
const thisHeading = urlParam.get("title");
const thisItemDescription = urlParam.get("itemDescription");
const imgSlice = urlParam.get("slice");


//set page values
function setPageValues(){
	document.getElementById("title").value = thisHeading;
	document.getElementById("theHeading").innerHTML = thisHeading;
	document.getElementById("price").value = thisPrice;
	document.getElementById("itemDescription").value = thisItemDescription;
	
	return;
}	

//preload image slices
var imgArray = new Array();
var arrayIndex = 0;
var rows = 4;
var columns = 5;

for (var row = 0; row < rows; row++){ 
	for(var col = 0; col < columns; col++){ 
			imgArray[arrayIndex] = new Image();
			imgArray[arrayIndex].src = imgSlice + "_r" + (row+1) + "_c" + (col+1) +".jpg";
			arrayIndex++;
		}
	}
		
//render preloaded image slices
function buildImageSlices(thisSlice){

	var rows = 4;
	var columns = 5;
	var i = 0;
	var buildTable = '<table border="0" cellpadding="0" cellspacing="0">';
		
	for (var row = 0; row < rows; row++){ 
		buildTable += "<tr>";
	for(var col = 0; col < columns; col++){ 
			buildTable += "<td>";
			buildTable += "<img src = '" + imgArray[i].src + "'>";
			i++;
			buildTable += "</td>"
			}
		buildTable += "</tr>";
		}
			
		buildTable += "</table>";
		//alert(unescape(buildTable));
		document.write(unescape(buildTable));
		return;
	}