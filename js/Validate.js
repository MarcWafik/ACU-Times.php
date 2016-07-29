function findhelpblockInNodes(Check) {
	for (var i = 0; i < Check.parentNode.childNodes.length; i++) {
		if (Check.parentNode.childNodes[i].className === "help-block") {
			return Check.parentNode.childNodes[i];
		}
	}
}
//=========================================YouTube=========================================
function valYouTube(Check) {
	var patt = /(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/;
	if (patt.test(Check.value) || Check.value === "") {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	} else {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "invalid youtube video link ";
		return false;
	}
}
//=========================================Name=========================================
function valName(Check) {
	var patt = /^[A-Za-z\s]+$/;
	if (!patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Enter a Valid Name (Letters and space only)";
		return false;
	} else {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	}
}
//=========================================ID=========================================
function valID(Check) {
	var patt = /^\d+$/;
	if (!patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Enter your university ID";
		return false;
	} else {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	}
}
//=========================================Email=========================================
function valEmail(Check) {
	var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Enter a Valid E-mail";
		return false;
	} else {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	}
}
//=========================================Password=========================================
function valPassword(Check) {
	var patt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
	if (!patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)";
		return false;
	} else {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	}
}
//=========================================RePassword=========================================

function valRePassword(Check, Original) {
	var RePasswordAlert = document.getElementById("Validate_RePassword");
	if (Original.value !== Check.value) {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Password does not match";
		return false;
	} else {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	}
}
//=========================================PhoneNo=========================================
function valPhoneNo(Check) {
	var patt = /^[0-9]*$/;
	if (patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	} else {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Enter a correct Phone Number";
		return false;
	}
}
//=========================================BrithDay=========================================
function valBirthday(Month, Year, Day) {
	var x = Day;
	var Lin = x.length - 1 + 1;
	Year = Year.value;

	var DaysInEatchMonth = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	if ((parseInt(Year) % 4 === 0) && (parseInt(Year) % 100 !== 0) || (parseInt(Year) % 400 === 0)) {
		DaysInEatchMonth[2] = 29;
	}

	for (var i = Lin - 1; i >= DaysInEatchMonth[Month.value]; i--) {
		x.remove(i);
	}

	for (var j = Lin + 1; j <= DaysInEatchMonth[Month.value]; j++) {
		var option = document.createElement("option");
		option.text = j;
		option.value = j;
		x.add(option);
	}
}
//=========================================Title=========================================
function valPhoneNo(Check) {
	var patt = /^[0-9]*$/;
	if (patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	} else {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Enter a correct Phone Number";
		return false;
	}
}
//=========================================Arabic=========================================
function valArabic(Check) {
	var patt = /^[\u0600-\u06FF]*$]/;
	if (patt.test(Check.value)) {
		Check.parentNode.parentNode.className = "form-group";
		findhelpblockInNodes(Check).innerHTML = "";
		return true;
	} else {
		Check.parentNode.parentNode.className = "form-group has-error";
		findhelpblockInNodes(Check).innerHTML = "Enter a correct Phone Number";
		return false;
	}
}