<?php
require_once('ControlUsers.php');
if(valAllnull() && valAll()){
	    echo "succses " ;
    $right_now = getdate();
	$arr = array( 
		$_POST["ID"],
		$_POST["Password"],
		$_POST["name"],
		$_POST["email"],
		$_POST["PhoneNo"],
		$_POST["Gender"],
		$_POST["BirthdayDay"],
		$_POST["BirthdayMonth"],
		$_POST["BirthdayYear"],
		$right_now["mday"],
		$right_now["mon"],
		$right_now["year"]);
		
	$User = ArrToUser($arr);
	appendUser($User);
	header("Location: SignupSuccessful.php");
	exit;
}
//=========================================validate=========================================
function valAll() {
	return 	valName($_POST["name"]) && valID($_POST["ID"]) && valEmail($_POST["email"]) && valPassword($_POST["Password"]) && valRePassword($_POST["RePassword"] , $_POST["Password"]) && valBirthday ($_POST["BirthdayMonth"] , $_POST["BirthdayYear"] , $_POST["BirthdayDay"]) && valPhoneNo($_POST["PhoneNo"]);
}
function valAllnull() {
	return 	isset($_POST["name"]) && isset($_POST["ID"]) && isset($_POST["email"]) && isset($_POST["Password"]) && isset($_POST["RePassword"]) && isset($_POST["BirthdayMonth"]) && isset($_POST["BirthdayYear"])&& isset($_POST["BirthdayDay"]) && isset($_POST["PhoneNo"]);
}
?>
<!DOCTYPE html>

<html>
<head>
<title>ACU Times | Register</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/Validate.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<style></style>
</head>
<body>
<?php include ("Header.php");?>

<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div class="clear"><br>
		<br>
	</div>
	<div style="margin: 0 auto; width: 340px;text-align:left;"> <br>
		<form action="SignUp.php" method="post">
			<!-- #################################################################### name #################################################################### -->
			<div class="MyContainer">
				<label for="name">Full name :</label>
				<br>
				<input type="text" name="name" id="name" value="<?php echo @$_POST["name"]; ?>" class="MyInput" onBlur="valName(this,Validate_name)" required autocomplete="on">
				<small>
				<div id="Validate_name" name = "Validate_name" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### ID #################################################################### -->
			<div class="MyContainer">
				<label for="ID">University ID :</label>
				<br>
				<input type="text" name="ID" id="ID" value="<?php echo @$_POST["ID"]; ?>" class="MyInput" onBlur="valID(this,Validate_ID)" required autocomplete="on">
				<small>
				<div id="Validate_ID" name = "Validate_ID" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### email #################################################################### -->
			<div class="MyContainer">
				<label for="email">E-Mail :</label>
				<br>
				<input type="email" name="email" id="email" value="<?php echo @$_POST["email"]; ?>" class="MyInput" onBlur="valEmail(this,Validate_email)" required autocomplete="on">
				<small>
				<div id="Validate_email" name = "Validate_email" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### Password #################################################################### -->
			<div class="MyContainer">
				<label for="Password">Password :</label>
				<br>
				<input type="password" name="Password" id="Password" value="" class="MyInput" onBlur="valPassword(this,Validate_Password)" required>
				<small>
				<div id="Validate_Password" name = "Validate_Password" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### RePassword #################################################################### -->
			<div class="MyContainer">
				<label for="RePassword">Reenter password :</label>
				<br>
				<input type="password" name="RePassword" id="RePassword" value="" class="MyInput" onBlur="valRePassword(this,Validate_RePassword,Password)" required>
				<small>
				<div id="Validate_RePassword" name = "Validate_RePassword" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### PhoneNo #################################################################### -->
			<div class="MyContainer">
				<label for="PhoneNo">Phone Number (optional) :</label>
				<br>
				<input type= "tel" name="PhoneNo" id="PhoneNo" value="<?php echo @$_POST["PhoneNo"]; ?>" class="MyInput" onBlur="valPhoneNo(this,Validate_PhoneNo)" autocomplete="on">
				<small>
				<div id="Validate_PhoneNo" name = "Validate_PhoneNo" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### Gender #################################################################### -->
			<div class="MyContainer">
				<label for="Gender" >Gender :</label>
				<br>
				<select  style="padding:3px;"  class="MyInput" name="Gender" id="Gender" required >
					<option value="M">Male</option>
					<option value="F">Female</option>
					<option value="" selected="selected">Do not specify</option>
				</select>
				<small>
				<div id="Validate_Gender" name = "Validate_Gender" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### Birthday #################################################################### -->
			<div class="MyContainer">
				<label for="BirthdayYear" >Birthday :</label>
				<br>
				<select  style="padding:3px; width:32%"  class="MyInput" name="BirthdayYear" id="BirthdayYear" required  onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)">
					<?php 
					  $right_now = getdate();
					  $this_year = $right_now['year'];
					  for ($i = $this_year ; $i>2005 ;$i--) {
						  echo "<option value='{$i}' >{$i}</option>";
					  }
       				?>
<option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option>
				</select>
				<select  style="padding:3px;width:33%"  class="MyInput" name="BirthdayMonth" id="BirthdayMonth" required onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)">
<option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">Jully</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
				</select>
				<select  style="padding:3px; width:32%"  class="MyInput" name="BirthdayDay" id="BirthdayDay" required onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
				</select>
				<small>
				<div id="Validate_Birthday" name = "Validate_Birthday" class="MyAlret"></div>
				</small> </div>
			<!-- #################################################################### g-recaptcha #################################################################### -->
			<div class="MyContainer">
				<div class="g-recaptcha" data-sitekey="6Ldh-RkTAAAAAPtk9mzLYazqa7A9twsF8-2dMPuC"> </div>
			</div>
			<!-- #################################################################### Submit #################################################################### -->
			<div  class="MyContainer" style="text-align:center"> <small>Clicking Create account means that you agree to <br>
				our <a href="Register.html" title="Services Agreement">Services Agreement</a> and <a href="Register.html">Privacy Policy</a><br>
				<br>
				</small>
				<div class="center">
					<input class="Mysubmit" style="border-radius:5px" name="submit" type="submit" id="submit" value="Creat Account">
				</div>
			</div>
				<div id="Error" name = "Error" class="MyAlret" style="text-align:center"> <?php //if((!valAllnull())) echo "Please check the values marked in red"; ?></div>
			<!-- ####################################################################  #################################################################### -->
		</form>
		<div class="clear"><br>
			<br>
		</div>
	</div>
</div>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<?php include ("Footer.html");?>

</body>
</html>
