<!DOCTYPE html>

<html>
<head>
<title>Edit profile</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<style>
.ER_404 {
	font-size: 200px;
	float: left;
}
.ER_SSWW {
	font-size: 36px;
	float: left;
}

@media screen and (min-width : 250px) and (max-width : 650px) {
.ER_404 {
	font-size: 100px;
	float: none;
	text-align: center;
}
.ER_SSWW {
	font-size: 26px;
}
}
</style>
</head>
<body>
<?php include ("Header.html");?>
<!-------------------------------------------------------------------------- content -------------------------------------------------------------------------->
<div class="wrapper row3">
	<div id="container"> 
		<!-- ################################################################################################ -->
		<div id="fof" class="clear"> 
			<!-- ####################################################################################################### -->
			<div class="clear">
				<div class="ER_404">
					<h1>404</h1>
				</div>
				<div class="ER_SSWW">
					<h2><br>
						Error - Sorry Something Went Wrong !</h2>
				</div>
			</div>
			<div class="divider2"></div>
			<p class="notice">For Some Reason The Page You Requested Could Not Be Found On Our Server</p>
			<p class="clear"><a class="fl_left" href="javascript:history.go(-1)">&laquo; Go Back</a> <a class="fl_right" href="index.php">Go Home &raquo;</a></p>
			<!-- ####################################################################################################### --> 
		</div>
		<!-- ################################################################################################ -->
		<div class="clear"></div>
	</div>
</div>
<?php include ("Footer.html");?>
</body>
</html>