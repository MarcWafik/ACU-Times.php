			var offsetMultiplier = 0;
			function loadMore(comand) {
				var xhttp;
				if (window.XMLHttpRequest) {
					xhttp = new XMLHttpRequest();
				} else {
					xhttp = new ActiveXObject("Microsoft.XMLHTTP");// code for IE6, IE5
				}
				xhttp.open("GET", comand+"&offsetMultiplier="+offsetMultiplier, true);
				offsetMultiplier++;
				xhttp.onreadystatechange = function () {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("apendAJAX").innerHTML += xhttp.responseText;
					}
				};
				xhttp.send();
			}