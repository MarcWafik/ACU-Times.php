<?php require_once 'autoload.php';?>
<!doctype html>
<html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
   <div class="text-center center-block">
	<div class="Succses-code"><i class="fa fa-check"></i></div>
	<h1>Thank you for the info you submited</h1>
	<div class="text-muted"> Here are the statistics</div>
</div>







<div class="container"> <br>
	<label><span><?php echo"<h2> $filecontent[0] </h2> ";?></span></label>
	<br>
	<label><span><?php echo"<h3> $filecontent[1] : </h3> ";?></span></label>
	<label><span><?php echo"<h3>$datacontent[0]  </h3> ";?></span></label>
	<br>
	<label><span><?php echo"<h3> $filecontent[2] : </h3> ";?></span></label>
	<label><span><?php echo"<h3>$datacontent[1]  </h3> ";?></span></label>
	<br>
	<br>
	<label><span><?php echo"<h3>TOTAL : $datacontent[2]  </h3> ";?></span></label>
	<br>
</div>
<br>
<br>
<br>
<br>
<?php include ("Footer.php");?>
</body>
</html>