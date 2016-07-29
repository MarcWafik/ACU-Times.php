<?php require_once ("ControlUsers.php");?>
<?php require_once ("ControlSession.php");?>
<?php
Check_Login();
if(isset($_GET["ID"])){
	$user = LoadUser($_GET["ID"]);
	if($user==NULL){
		header("Location: 404.php");
		exit();
	}
}else{
$user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Profile</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<!-- content -->
	<div class="container">
		<h3 <?php if(isset($_GET["ID"])){ echo 'style="display:none"'; }?>>
		<ul class="nav nav-pills">
			<li role="presentation" class="active"><a>Profile</a></li>
			<li role="presentation"><a href="EditProfile.php">Change personal info</a></li>
			<li role="presentation"><a href="ChangePW.php">Change Password</a></li>
		</ul>
	</h3>
		<br><br><br>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="<?php if(isset($user["Photo"]) && $user["Photo"]!="" && $user["Photo"]!=" ") echo $user["Photo"] ; else echo "images/User.png"; ?>" style="height:200px; width:200px;" class="avatar img-circle" alt="avatar">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">ID:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["ID"]; ?></p>
        </div>
		<!-- ####################################################################  #################################################################### -->
        <div class="form-group">
          <label class="col-lg-3 control-label">Member Since:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["RegisterDay"]."/".$user["RegisterMonth"]."/".$user["RegisterYear"]; ?></p>
        </div><hr>
		<!-- ####################################################################  #################################################################### -->
        <div class="form-group">
          <label class="col-md-3 control-label">Name:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["name"]; ?></p>
        </div>
		<!-- ####################################################################  #################################################################### -->
        <div class="form-group">
          <label class="col-lg-3 control-label">E-mail:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["email"]; ?></p>
        </div>
		<!-- ####################################################################  #################################################################### -->
        <div class="form-group">
          <label class="col-lg-3 control-label">PhoneNumber:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["PhoneNo"]; ?></p>
        </div>
		<!-- ####################################################################  #################################################################### -->
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender:</label>
		  <p class=" col-lg-8 form-control-static">
		  <?php 
		  if(@$user["Gender"]=="F"){
		  	echo "Female";
		  }else if(@$user["Gender"]=="M"){
			  echo "Male";}?></p>
        </div>
		<!-- ####################################################################  #################################################################### -->
        <div class="form-group">
          <label class="col-lg-3 control-label">Birthday:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["BirthdayDay"]."/".$user["BirthdayMonth"]."/".$user["BirthdayYear"]; ?></p>
		</div>
		<!-- ####################################################################  #################################################################### -->
		<div class="form-group">
          <label class="col-lg-3 control-label">About:</label>
		  <p class=" col-lg-8 form-control-static"><?php echo @$user["About"]; ?></p>
		</div>
		<!-- ####################################################################  #################################################################### -->
      </form>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<?php include ("Footer.php");?>
</body>
</html>
