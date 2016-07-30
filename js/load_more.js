var offsetMultiplier = 1;
function loadMore(comand) {
	comand = comand.value;
	var xhttp;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");// IE6, IE5
	}
	xhttp.open("GET", comand + "&offsetMultiplier=" + offsetMultiplier, true);
	offsetMultiplier++;
	xhttp.onreadystatechange = function () {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("apendAJAX").innerHTML += xhttp.responseText;
		}
	};
	xhttp.send();
}