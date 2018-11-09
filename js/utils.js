var pos = 0;
var goRight = true;

function isNull(elementId) {
	var elementValue = "";
	
	if(elementId!=null && elementId!="") {
		//alert("Starting isNUll");		
		elementValue = document.getElementById(elementId).value;
		//alert("elementValue " + elementValue);
		if(elementValue!=null && elementValue!="") {
			return false;
		} 
					
	} else {
		console.log("Element Name is empty");
	}
				
	return true;
				
}

function doExist(elementId) {
	if(document.getElementById(elementId)!=null) {
		return true;
	}
	return false;
}

function elementDisplay(elementId) {
	elementDisplayToggle(elementId, true);
}

function elementHidden(elementId) {
	elementDisplayToggle(elementId, false);
}

function elementDisplayToggle(elementId, isDisplay) {
	
	var elementStyleDisplay = "";
	if (!doExist(elementId)) {
		console.log("Element: " + elementId + " does not exist.");
		
	} else {
		elementStyleDisplay = document.getElementById(elementId).style.display;
		if(isDisplay) {
			document.getElementById(elementId).style.display = "";
		} else {
			document.getElementById(elementId).style.display = "none";
		}
	}
}

function doItemMovement() {
	console.log("doItemMovement() pos=" + pos + " window.innerWidth " + window.innerWidth);
	var mypara = document.getElementById("movingItem");
	if(window.innerWidth > 500) {
		if (goRight) {
			pos += 5;
			if (pos > window.innerWidth - 500) {
				goRight = false;
			}
		} else {
			pos -= 5;
			if (pos < 0) {
				goRight = true;
			}
		}
		var posString = pos + "px";
		mypara.style.left = posString;
	} else {
		//do not move because the window's width is too short.
	}
}