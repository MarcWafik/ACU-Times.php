<?php
require_once 'autoload.php';
$User = new User();
$User->_init();

if (isset($_GET["ID"])) {
	if (!$User->read($_GET["ID"])) {
		header("Location: 404.php");
		exit();
	}
} else if (!$User->read(User::getSessionUserID())) {
	header("Location: 404.php");
	exit();
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Profile</title>
		<?php require_once("Header.php"); ?>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<!-- content -->
		<div class="container">
			<h3 <?php
			if (isset($_GET["ID"])) {
				echo 'style="display:none"';
			}
			?>>
				<ul class="nav nav-pills" style="<?php if (!isset($_GET["ID"])) echo "display: none"; ?>">
					<li role="presentation" class="active"><a>Profile</a></li>
					<li role="presentation"><a href="EditProfile.php">Change personal info</a></li>
					<li role="presentation"><a href="EditProfilePW.php">Change Password</a></li>
				</ul>
			</h3>
			<br><br><br>
			<form class="form-horizontal">
				<!-- left column -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="text-center">
						<img src="<?php
						if (isset($user["Photo"]) && $user["Photo"] != "" && $user["Photo"] != " ")
							echo $user["Photo"];
						else
							echo "images/User.png";
						?>" class="img-200x200 avatar img-circle" alt="avatar">
					</div>
				</div>
				<!-- edit form column -->
				<div class="col-md-8 col-sm-6 col-xs-12 personal-info">

					<div class="form-group">
						<label class="col-lg-3 control-label">ID:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getId(); ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-lg-3 control-label">Member Since:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getCreatDate_StringLong() ?></p>
					</div><hr>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-md-3 control-label">Name:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getfullName() ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-lg-3 control-label">E-mail:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getEmail(); ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-lg-3 control-label">PhoneNumber:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getPhoneNumber(); ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-lg-3 control-label">Gender:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getGenderString(); ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-lg-3 control-label">Birthday:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getBirthdateStringLong() ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
					<div class="form-group">
						<label class="col-lg-3 control-label">About:</label>
						<p class=" col-lg-8 form-control-static"><?php echo $User->getAbout(); ?></p>
					</div>
					<!-- ####################################################################  #################################################################### -->
				</div>	
			</form>
		</div>
		<!-- ################################################################################################ -->
		<?php include ("Footer.php"); ?>
	</body>
</html>
