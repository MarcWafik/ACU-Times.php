<?php
require_once 'autoload.php';
User::CheckLogin();
$User = new User();
$User->__init();

if (isset($_GET["id"])) {
	if (!$User->read($_GET["id"])) {
		Header::ResponseCode(Header::NOT_FOUND);
		exit();
	}
} else if (!$User->read(User::getSessionUserID())) {
	Header::ResponseCode(Header::NOT_FOUND);
	exit();
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Profile</title>
		<?php require_once("header.php"); ?>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<!-- content -->
		<div class="container">
			<h3 <?php
			if (isset($_GET["id"])) {
				echo 'style="display:none"';
			}
			?>>
				<ul class="nav nav-pills">
					<li role="presentation" class="active"><a>Profile</a></li>
					<li role="presentation"><a href="edit_profile.php">Change personal info</a></li>
					<li role="presentation"><a href="edit_profile_pw.php">Change Password</a></li>
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
						<label class="col-lg-3 control-label">Name:</label>
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
		<?php include ("footer.php"); ?>
	</body>
</html>
