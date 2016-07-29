<?php 
require_once("ControlUsers.php");
require_once("ControlSession.php");
require_once("ControlFunctions.php");
Check_Login();
$user =$_SESSION['user'];
$iscorrect = Array();
$Passed = FALSE ;
if(valAllNotnull()){
	$iscorrect = valArrIscorrect();
	$iscorrect["Password"] = FALSE ;  
	if ((Encrypt_And_Hash($_POST["Password"]) == $user["Password"]))$iscorrect["Password"] = TRUE;
	
	if(valAll($iscorrect)){
		$user = LoadUser($_SESSION['user']["ID"]);
		
		$user["name"]=$_POST["name"];
		$user["email"]=$_POST["email"];
		$user["PhoneNo"]=$_POST["PhoneNo"];
		$user["Gender"]=$_POST["Gender"];
		$user["BirthdayDay"]=$_POST["BirthdayDay"];
		$user["BirthdayMonth"]=$_POST["BirthdayMonth"];
		$user["BirthdayYear"]=$_POST["BirthdayYear"];
		$user["About"]=$_POST["About"];
					
		UpdateUser($user);
		$_SESSION["user"] = $user;
		$Passed = TRUE ;
	}
}
//=========================================validate=========================================
function valAll($iscorrect) {
foreach ($iscorrect as $key => $value){
	if(FALSE == $value){
		return FALSE;	
		}
	}
	return TRUE;
}
function valArrIscorrect() {
	$iscorrect = Array(
			"name"=>valName($_POST["name"]) , 
			"email"=>valEmail($_POST["email"]) , 
			"Birthday"=>valBirthday ($_POST["BirthdayMonth"] , $_POST["BirthdayYear"] , $_POST["BirthdayDay"]) , 
			"PhoneNo"=>valPhoneNo($_POST["PhoneNo"]),);
	return 	$iscorrect;
}
function valAllNotnull() {
	return 	
	isset($_POST["name"]) && 
	isset($_POST["email"]) && 
	isset($_POST["Password"]) && 
	isset($_POST["BirthdayMonth"]) && 
	isset($_POST["BirthdayYear"])&& 
	isset($_POST["BirthdayDay"]) && 
	isset($_POST["PhoneNo"]) && 
	isset($_POST["About"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Edit Profile</title>
<?php require_once("Header.php");?>
<script src="js/Validate.js"></script>
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
			<div class="text-center"> <img src="<?php if(isset($user["Photo"]) && $user["Photo"]!="" && $user["Photo"]!=" ") echo $user["Photo"] ; else echo "images/User.png"; ?>" style="height:200px; width:200px;" class="avatar img-circle" alt="avatar">
				<!--<input type="file" class="text-center center-block well well-sm">-->
			</div>
		</div>
		<!-- edit form column -->
		<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
			<?php if($Passed) 
			echo '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> <i class="fa fa-check"></i> Personal updated succsesfuly </div>' ?>
			<h3>Personal info</h3>
			<form class="form-horizontal" role="form" action="EditProfile.php" method="post">
				<div class="form-group">
					<label for="name" class="col-lg-3 control-label">Full name :</label>
					<div class="col-md-8">
						<input type="text" name="name" id="name" value="<?php echo @$user["name"]; ?>" class="form-control" onBlur="valName(this,Validate_name)" required autocomplete="on">
						<div id="Validate_name" name = "Validate_name" class="MyAlret">
							<?php if(isset($iscorrect["name"])&&!$iscorrect["name"]) echo "Enter a Valid Name (Letters and space only)" ?>
						</div>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label for="PhoneNo" class="col-lg-3 control-label">Phone Number :</label>
					<div class="col-md-8">
						<input type= "text" name="PhoneNo" id="PhoneNo" value="<?php echo @$user["PhoneNo"]; ?>" class="form-control" onBlur="valPhoneNo(this,Validate_PhoneNo)" autocomplete="on">
						<div id="Validate_PhoneNo" name = "Validate_PhoneNo" class="MyAlret">
							<?php if(isset($iscorrect["PhoneNo"])&&!$iscorrect["PhoneNo"]) echo "Enter a correct Phone Number" ?>
						</div>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label for="email" class="col-lg-3 control-label">E-Mail :</label>
					<div class="col-md-8">
						<input type="email" name="email" id="email" value="<?php echo @$user["email"]; ?>" class="form-control" onBlur="valEmail(this,Validate_email)" required autocomplete="on">
						<div id="Validate_email" name = "Validate_email" class="MyAlret">
							<?php if(isset($iscorrect["email"])&&!$iscorrect["email"]) echo "Enter a Valid E-mail" ?>
						</div>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-lg-3 control-label">Gender:</label>
					<div class="col-lg-8">
						<select class="selectpicker form-control" name="Gender" id="Gender" required>
							<option value="M"<?php if(@$user["Gender"]=="M") echo "selected"; ?>>Male</option>
							<option value="F"<?php if(@$user["Gender"]=="F") echo "selected"; ?>>Female</option>
							<option value="O" <?php if(@$user["Gender"]!="M"||@$user["Gender"]!="F") echo "selected"; ?>>Do not specify</option>
						</select>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-lg-3 control-label">Birthday:</label>
					<div class="ui-select">
						<div class="col-xs-3">
							<select class="selectpicker form-control" name="BirthdayYear" id="BirthdayYear" required  onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)" required>
							<?php 
								  $right_now = getdate();
								  $this_year = $right_now['year'];
								  for ($i = $this_year ; $i>($this_year-100) ;$i--) {
									  (@$user["BirthdayYear"]==$i)? $temp="selected" : $temp="";
									  echo "<option value='{$i}' {$temp}>{$i}</option>";
								  }
								?>
							</select>
						</div>
						<div class="col-xs-3">
							<select class="selectpicker form-control" name="BirthdayMonth" id="BirthdayMonth" required onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)" required>
							<?php $MonthName = array(January,February,March,April,May,June,Jully,August,September,October,November,December); 
								for ($i = 0 ; $i<12 ;$i++) {
									  (@$user["BirthdayMonth"]==($i+1))? $temp="selected" : $temp="";
									  echo "<option value='{$i}' {$temp}>{$MonthName[$i]}</option>";
								  }
							?>
							</select>
						</div>
						<div class="col-xs-2">
							<select class="selectpicker form-control" name="BirthdayDay" id="BirthdayDay" required onBlur="valBirthday(BirthdayMonth , BirthdayYear , BirthdayDay , Validate_Birthday)" required>
							<?php 
								  for ($i = 1; $i<=31 ;$i++) {
									  (@$user["BirthdayDay"]==$i)? $temp="selected" : $temp="";
									  echo "<option value='{$i}' {$temp}>{$i}</option>";
								  }
								?>
							</select>
						</div>
						<div id="Validate_Birthday" name = "Validate_Birthday" class="MyAlret">
							<?php if(isset($iscorrect["BirthDay"])&&!$iscorrect["BirthDay"]) echo "Enter a valid date" ?>
						</div>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-md-3 control-label" for="About">About:</label>
					<div class="col-md-8">
						<textarea class="form-control" rows="5" id="About" name="About"><?php echo @$user["About"]; ?></textarea>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-md-3 control-label">Current Password:</label>
					<div class="col-md-8">
						<input type="password" name="Password" id="Password" value="" class="form-control" required>
						<div id="Validate_Password" name = "Validate_Password" class="MyAlret">
							<?php if(isset($iscorrect["Password"])&&!$iscorrect["Password"]) echo "Password is incorrect" ?>
						</div>
					</div>
				</div>
				<!-- ####################################################################  #################################################################### -->
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
						<input class="btn btn-primary" value="Save Changes" type="submit">
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