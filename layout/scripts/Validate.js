//=========================================Name=========================================
function valName(Check, Warnning) {
	var patt = /^[A-Za-z\s]+$/;
	if (!patt.test(Check.value)) {
		Warnning.innerHTML = "Enter a Valid Name (Letters and space only)";
	} else {
		Warnning.innerHTML = "";
	}
}
//=========================================ID=========================================
function valID(Check, Warnning) {
	var patt = /^\d+$/;
	if (!patt.test(Check.value)) {
		Warnning.innerHTML = "Enter your university ID";
	} else {
		Warnning.innerHTML = "";
	}
}
//=========================================Email=========================================
function valEmail(Check, Warnning) {
	var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!patt.test(Check.value)) {
		Warnning.innerHTML = "Enter a Valid E-mail";
	} else {
		Warnning.innerHTML = "";
	}
}
//=========================================Password=========================================
function valPassword(Check, Warnning) {
	var patt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
	if (!patt.test(Check.value)) {
		Warnning.innerHTML = "Must contain a number ,upercase letter (A-Z) & lowercase letter (a-z)";
	} else {
		Warnning.innerHTML = "";
	}
}
//=========================================RePassword=========================================

function valRePassword(Check, Warnning, Original) {
	var RePasswordAlert = document.getElementById("Validate_RePassword");
	if (Original.value !== Check.value) {
		Warnning.innerHTML = "Password does not match";
	} else {
		Warnning.innerHTML = "";
	}
}
//=========================================PhoneNo=========================================
function valPhoneNo(Check, Warnning) {
	var patt = /^\d+$/;
	if (patt.test(Check.value)) {
		Warnning.innerHTML = "";
	} else {
		Warnning.innerHTML = "Enter a correct Phone Number";
	}
}
//=========================================BrithDay=========================================
function valBirthday(Month , Year , Day , Warnning) {
	Year = Year.value;
	var DaysInEatchMonth = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	if ((parseInt(Year) % 4 === 0) && (parseInt(Year) % 100 !== 0) || (parseInt(Year) % 400 === 0))	{	DaysInEatchMonth[2]=29;	}
	if(Day.value>DaysInEatchMonth[Month.value])
	{
		Warnning.innerHTML = Day.value+"/"+Month.value+"/"+Year+ " is not a valid date";
	}
	else{
		Warnning.innerHTML = "";
	}
    //var sel = document.getElementById("BirthdayDay").options[3];
}