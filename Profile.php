<!DOCTYPE html>

<html>
<head>
<title>ACU Times | Profile</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
</head>

<style>
#insider ul {
	font-size: 1em;
	font-weight: bold;
	border: 10px;
	width: 50%;
	height: 1%;
	padding: -20%;
	margin: 1% 20%;
}

@media screen and (min-width : 240px) and (max-width : 360px) {
.flexslider .slides li .flex-caption, .flex-direction-nav, .flex-control-nav .li {
	display: none;
}
}

@media screen and (min-width : 361px) and (max-width : 600px) {
.flexslider .slides li .flex-caption, .flex-direction-nav {
	display: none;
}
}

@media screen and (min-width : 551px) and (max-width : 800px) {
#featured_slide h2 {
	font-weight: bold;
}
#featured_slide p {
	margin: 0 0 4px 0;
	line-height: normal;
}
#featured_slide h2, #featured_slide p, #featured_slide footer {
	font-size: .9em;
}
}
#insider .img {
	width: auto;
	height: auto;
}
.andrew {
	margin-left: 88px;
	margin-top: -18px;
	border: 10px;
}
#edit {
	margin-left: 90%;
	text-height: -380%;
}
</style>

<body>
<?php include ("Header.html");?>
<!-- content -->
<div class="wrapper row3">
	<div id="container"> 
		<!-- ################################################################################################ --?
		<!-- main content -->
		
		<div id="insider"> <a href="#"><img src="images/demo/166x130.gif" alt="" class="img"></a> <br>
			<input name="Change image" type="submit"  value="Change image">
			<ul>
				<div>
					<li>ID:
						<div id="id" class="andrew">dfsdsf</div>
					</li>
				</div>
				<br>
				<div>
					<li>First Name:
						<div id="FirstName" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li> Last Name:
						<div id="LastName" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li>User Name:
						<div id="UserName" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li> Birthday:
						<div id="Birthday" class="andrew"> dsfg</div>
					</li>
				</div>
				<br>
				<hr>
				<div  id="edit"> <a class="btn vd_btn btn-xs vd_bg-yellow"> <i class="fa fa-pencil append-icon"></i> Edit </a> </div>
				<br>
				<div>
					<li>City:
						<div id="City" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li>Password:
						<div id="Password" class="andrew">dsfg</div>
					</li>
					<br>
				</div>
				<div>
					<li>Email:
						<div id="Email" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li> Website:
						<div id="Website" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li> Phone:
						<div id="Phone" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<hr>
				<br>
				<div>
					<li> Addresse:
						<div id="Addresse" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li>work:
						<div id="work" class="andrew">dsfg</div>
					</li>
				</div>
				<br>
				<div>
					<li> Education:
						<div id="Education" class="andrew">dsfg</div>
					</li>
				</div>
			</ul>
		</div>
	</div>
</div>

<!-- ################################################################################################ --> 
<?php include ("Footer.html");?>
</body>
</html>