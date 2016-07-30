<?php
require_once 'autoload.php';
$arr = Gallery::readAll();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Gallery</title>
		<?php require_once("Header.php"); ?>
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script> 
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<div class="container">
			<br><br>
			<div class="gallery" >
				<?php
				foreach ($arr as $value) {
					PrintHTML::gallery($value);
				}
				?>
			</div>
		</div>
		<?php include ("Footer.php"); ?>
		<script type="text/javascript">
			$(document).ready(function () {
				$(".fancybox").fancybox({
					'transitionIn': 'elastic',
					'transitionOut': 'elastic',
					'autoPlay': 'true',
					'playSpeed': '10000',
					'autoSize': 'true',
					'autoScale': 'true',
					//'centerOnScroll': 'true',
					'autoDimensions': 'true',
					'hideOnOverlayClick': true,
					'hideOnContentClick': true,
					'closeBtn': true,
					'padding': [0, 0, 0, 0],
					'margin': [0, 0, 0, 0],
					'fitToView': 'true',
					openEffect: 'elastic',
					openSpeed: 200,
					closeEffect: 'elastic',
					closeSpeed: 200,
					closeClick: true/*,
					 onStart: function(){ $("img").width("500"); },
					 helpers: {overlay : null}
					 */
				});

			});
		</script>
	</body>
</html>