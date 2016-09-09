<?php
require_once 'autoload.php';
AccessController::Create();
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
			<form class="form-horizontal" role="form" method="post" action="create_access.php<?php if (isset($_GET["id"])) echo "?id=" . $_GET["id"] ?>">
				<div class="form-group">
					<label class="control-label col-sm-2" for="titleEnglish">Title :</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="titleEnglish" 
							   id="titleEnglish" 
							   value="<?php echo @$Data["titleEnglish"]; ?>" 
							   placeholder="Enter title in English" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="128" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
							</ul>
						</span></div>
				</div>
				<!-- #################################################################### Title-AR #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="titleArabic">Title :</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="titleArabic" 
							   id="titleArabic" 
							   value="<?php echo @$Data["titleArabic"]; ?>" 
							   placeholder="Enter title in arabic" 
							   class="form-control" 
							   onBlur="valTitle(this)" 
							   maxlength="128" 
							   required 
							   autocomplete="on">
						<span class="help-block">
							<ul>
							</ul>
						</span></div>
				</div>
				<br>
				<h4 class="text-center text-primary">Has access to</h4>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2" for="article">Article:</label>
					<div class="col-sm-5">
						<select class="form-control" id="article" name="article">
							<option value="<?php Access::READ ?>" <?php if (@$Data[Article] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Article] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Article] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Article] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Article] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="poll">Poll:</label>
					<div class="col-sm-5">
						<select class="form-control" id="poll" name="poll">
							<option value="<?php Access::READ ?>" <?php if (@$Data[Poll] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Poll] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Poll] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Poll] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Poll] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="gallery">Gallery:</label>
					<div class="col-sm-5">
						<select class="form-control" id="gallery" name="gallery">
							<option value="<?php Access::READ ?>" selected<?php if (@$Data[Gallery] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Gallery] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Gallery] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Gallery] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Gallery] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="multimedia">Multimedia:</label>
					<div class="col-sm-5">
						<select class="form-control" id="multimedia" name="multimedia">
							<option value="<?php Access::READ ?>" <?php if (@$Data[Multimedia] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[Multimedia] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::APPROVE ?>"<?php if (@$Data[Multimedia] == 2) echo ' selected="selected"'; ?>>Approve</option>
							<option value="<?php Access::PUBLISH ?>"<?php if (@$Data[Multimedia] == 3) echo ' selected="selected"'; ?>>Publish</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[Multimedia] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="user">User:</label>
					<div class="col-sm-5">
						<select class="form-control" id="user" name="user">
							<option value="<?php Access::READ ?>" <?php if (@$Data[User] == 0) echo ' selected="selected"'; ?>>Read</option>
							<option value="<?php Access::CREATE ?>"<?php if (@$Data[User] == 1) echo ' selected="selected"'; ?>>Create</option>
							<option value="<?php Access::FULL ?>"<?php if (@$Data[User] == 4) echo ' selected="selected"'; ?>>Full</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right" name="submit" id="submit" >Submit</button>
			</form>
		</div>
		<?php include ("footer.php"); ?>
	</body>
</html>