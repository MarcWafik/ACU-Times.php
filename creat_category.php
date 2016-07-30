<?php
require_once 'autoload.php';
$accses = new Article();
if (isset($_GET["id"]) && $accses->read($_GET["id"])) {
	
} else if (isset($_GET["id"])) {
	header("Location: 404.php");
	exit;
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Article</title>
		<?php require_once("header.php"); ?>
		<script type="text/javascript" src="js/Poll.js"></script>
		<script type="text/javascript" src="js/SocialMedia.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container"> 
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="creat_article.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_en">Category name:</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="title_en" 
							   id="title_en" 
							   value="<?php echo @$Data["title_en"]; ?>" 
							   placeholder="Enter category name in English" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="32" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Title-AR #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="title_ar">Category name:</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="title_ar" 
							   id="title_ar" 
							   value="<?php echo @$Data["title_ar"]; ?>" 
							   placeholder="Enter category name in arabic" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="32" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
								<?php PrintHTML::validation("IDtaken", @$iscorrect["IDtaken"], "ID is Already Taken") ?>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Category #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="Category">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" id="Category" name="Category">
						<option value="-1">Major category</option>
							<?php
							foreach (Category::readAll() as $Category) {
								$Category->PrintOptionMainCategory();
							}
							?>
						</select>
					</div>
				</div>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>