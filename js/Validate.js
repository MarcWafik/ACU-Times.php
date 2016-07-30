var isAllOkay = [];

function isAllValid() {
	for (var i in isAllOkay) {
		if (!isAllOkay[i]) {
			return false;
		}
	}
	return true;
}
function findhelpblockInNodes(Check) {
	for (var i = 0; i < Check.parentNode.childNodes.length; i++) {
		if (Check.parentNode.childNodes[i].className === "help-block") {
			return Check.parentNode.childNodes[i];
		}
	}
}
function ChangeHelpBlock(Check, isTrue, message) {
	var helpBlock = findhelpblockInNodes(Check);
	var id_val = document.getElementById(Check.id + '_val');
	if (isTrue) {
		Check.parentNode.parentNode.className = "form-group";
		if (id_val !== null) {
			helpBlock.lastChild.removeChild(id_val);
		}
	} else {
		if (!helpBlock.hasChildNodes()) {
			helpBlock.appendChild(document.createElement("ul"))
		}
		Check.parentNode.parentNode.className = "form-group has-error";
		helpBlock.lastChild.innerHTML = '<li id="' + Check.id + '_val">' + message + "</li>";
	}
	return isTrue;
}
function valSubmit(Check) {
	//Check.disabled = true;
	return "hi";
}
//=========================================YouTube=========================================
function valYouTube(Check) {
	var patt = /(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/;
	isAllOkay.YouTube = (patt.test(Check.value) || Check.value === "");
	return ChangeHelpBlock(Check, isAllOkay.YouTube, "invalid youtube video link");
}
//=========================================Name=========================================
function valName(Check) {
	var patt = /^[A-Za-z\s]+$/;
	isAllOkay.Name = patt.test(Check.value);
	return ChangeHelpBlock(Check, isAllOkay.Name, "Enter a Valid Name (Letters and space only)");
}
//=========================================ID=========================================
function valID(Check) {
	var patt = /^\d+$/;
	isAllOkay.ID = (patt.test(Check.value));
	return ChangeHelpBlock(Check, isAllOkay.ID, "Enter your university ID");
}
//=========================================Email=========================================
function valEmail(Check) {
	var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	isAllOkay.Email = (patt.test(Check.value));
	return ChangeHelpBlock(Check, isAllOkay.Email, "Enter a Valid E-mail");
}
//=========================================Password=========================================
function valPassword(Check) {
	var patt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
	isAllOkay.Password = (patt.test(Check.value));
	return ChangeHelpBlock(Check, isAllOkay.Password, "Must contain a number (0-9) ,upercase letter (A-Z) & lowercase letter (a-z)");
}
//=========================================RePassword=========================================
function valRePassword(Check, Original) {
	isAllOkay.RePassword = (Original.value === Check.value);
	return ChangeHelpBlock(Check, isAllOkay.RePassword, "Password does not match");
}
//=========================================PhoneNo=========================================
function valPhoneNo(Check) {
	var patt = /^[0-9]*$/;
	isAllOkay.PhoneNo = (patt.test(Check.value));
	return ChangeHelpBlock(Check, isAllOkay.PhoneNo, "Enter a correct Phone Number");
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
function valTitleEnglish(Check) {

	isAllOkay.Title = true;
	return ChangeHelpBlock(Check, isAllOkay.TitleEnglish, "only Letters, space and symbols are allowed)");
}
//=========================================Description=========================================
function valDescriptionEnglish(Check) {

	isAllOkay.Description = true;
	return ChangeHelpBlock(Check, isAllOkay.DescriptionEnglish, "only Letters, space and symbols are allowed");
}
//=========================================Arabic=========================================
function valTitleArabic(Check) {
	var patt = /^[\u0600-\u06FF]*$]/;
	isAllOkay.Arabic = (patt.test(Check.value));
	return ChangeHelpBlock(Check, isAllOkay.TitleArabic, "only arrabic is allowed");
}
//=========================================Arabic=========================================
function valDescriptionArabic(Check) {
	var patt = /^[\u0600-\u06FF]*$]/;
	isAllOkay.Arabic = (patt.test(Check.value));
	return ChangeHelpBlock(Check, isAllOkay.DescriptionArabic, "only arrabic is allowed");
}