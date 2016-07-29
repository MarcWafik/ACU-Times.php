<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Edit Profile</title>
<?php require_once("Header.php");?>
<script src="layout/js/Validate.js"></script>
</head>
<body>
<?php include ("Navbar.php");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="container">
	<h3>
		<ul class="nav nav-pills">
			<li role="presentation"><a href="Profile.php">Profile</a></li>
			<li role="presentation" class="active"><a>Change personal info</a></li>
			<li role="presentation"><a href="ChangePW.php">Change Password</a></li>
		</ul>
	</h3>
	<br>
	<br>
	<br>
	<div class="row"> 
		<!-- left column -->
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="text-center"> <img src="http://placehold.it/200x200" style="height:200px; width:200px;" class="avatar img-circle img-thumbnail" alt="avatar">
				<input type="file" class="text-center center-block well well-sm">
			</div>
		</div>
		<!-- edit form column -->
		<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
			<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-coffee"></i> Display Alert here </div>
			<h3>Personal info</h3>
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-lg-3 control-label">Name:</label>
					<div class="col-lg-8">
						<input class="form-control" value="" type="text">
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-lg-3 control-label">Phone Number:</label>
					<div class="col-lg-8">
						<input class="form-control" value="" type="text">
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-lg-3 control-label">Country:</label>
					<div class="col-lg-8">
						<input class="form-control" value="" type="text">
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-md-3 control-label">Address:</label>
					<div class="col-md-8">
						<input class="form-control" value="" type="text">
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-8">
						<input class="form-control" value="" type="text">
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-lg-3 control-label">Birthday:</label>
					<div class="ui-select">
						<div class="col-xs-3">
							<select class="selectpicker form-control" name="BirthdayYear" id="BirthdayYear" required  onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)">
								<?php 
					  $right_now = getdate();
					  $this_year = $right_now['year'];
					  for ($i = $this_year ; $i>2005 ;$i--) {
						  echo "<option value='{$i}' >{$i}</option>";
					  }
       				?>
								<option value="2005">2005</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="2000">2000</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="1996">1996</option>
								<option value="1995">1995</option>
								<option value="1994">1994</option>
								<option value="1993">1993</option>
								<option value="1992">1992</option>
								<option value="1991">1991</option>
								<option value="1990">1990</option>
								<option value="1989">1989</option>
								<option value="1988">1988</option>
								<option value="1987">1987</option>
								<option value="1986">1986</option>
								<option value="1985">1985</option>
								<option value="1984">1984</option>
								<option value="1983">1983</option>
								<option value="1982">1982</option>
								<option value="1981">1981</option>
								<option value="1980">1980</option>
								<option value="1979">1979</option>
								<option value="1978">1978</option>
								<option value="1977">1977</option>
								<option value="1976">1976</option>
								<option value="1975">1975</option>
								<option value="1974">1974</option>
								<option value="1973">1973</option>
								<option value="1972">1972</option>
								<option value="1971">1971</option>
								<option value="1970">1970</option>
								<option value="1969">1969</option>
								<option value="1968">1968</option>
								<option value="1967">1967</option>
								<option value="1966">1966</option>
								<option value="1965">1965</option>
								<option value="1964">1964</option>
								<option value="1963">1963</option>
								<option value="1962">1962</option>
								<option value="1961">1961</option>
								<option value="1960">1960</option>
								<option value="1959">1959</option>
								<option value="1958">1958</option>
								<option value="1957">1957</option>
								<option value="1956">1956</option>
								<option value="1955">1955</option>
								<option value="1954">1954</option>
								<option value="1953">1953</option>
								<option value="1952">1952</option>
								<option value="1951">1951</option>
								<option value="1950">1950</option>
								<option value="1949">1949</option>
								<option value="1948">1948</option>
								<option value="1947">1947</option>
								<option value="1946">1946</option>
								<option value="1945">1945</option>
								<option value="1944">1944</option>
								<option value="1943">1943</option>
								<option value="1942">1942</option>
								<option value="1941">1941</option>
								<option value="1940">1940</option>
								<option value="1939">1939</option>
								<option value="1938">1938</option>
								<option value="1937">1937</option>
								<option value="1936">1936</option>
								<option value="1935">1935</option>
								<option value="1934">1934</option>
								<option value="1933">1933</option>
								<option value="1932">1932</option>
								<option value="1931">1931</option>
								<option value="1930">1930</option>
								<option value="1929">1929</option>
								<option value="1928">1928</option>
								<option value="1927">1927</option>
								<option value="1926">1926</option>
								<option value="1925">1925</option>
								<option value="1924">1924</option>
								<option value="1923">1923</option>
								<option value="1922">1922</option>
								<option value="1921">1921</option>
								<option value="1920">1920</option>
								<option value="1919">1919</option>
								<option value="1918">1918</option>
								<option value="1917">1917</option>
								<option value="1916">1916</option>
								<option value="1915">1915</option>
								<option value="1914">1914</option>
								<option value="1913">1913</option>
								<option value="1912">1912</option>
								<option value="1911">1911</option>
								<option value="1910">1910</option>
								<option value="1909">1909</option>
								<option value="1908">1908</option>
								<option value="1907">1907</option>
								<option value="1906">1906</option>
								<option value="1905">1905</option>
								<option value="1904">1904</option>
								<option value="1903">1903</option>
								<option value="1902">1902</option>
								<option value="1901">1901</option>
								<option value="1900">1900</option>
							</select>
						</div>
						<div class="col-xs-3">
							<select class="selectpicker form-control" name="BirthdayMonth" id="BirthdayMonth" required onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">Jully</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="col-xs-2">
							<select class="selectpicker form-control" name="BirthdayDay" id="BirthdayDay" required onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						</div>
					</div>
				</div>
				
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-md-3 control-label">Current Password:</label>
					<div class="col-md-8">
						<input class="form-control" value="" type="password">
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
						<input class="btn btn-primary" value="Save Changes" type="button">
						<span></span>
						<input class="btn btn-default" value="Cancel" type="reset">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include ("Footer.php");?>
</body>
</html>