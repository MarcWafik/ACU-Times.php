<?php
require_once 'autoload.php';
PollController::Create();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Creat Poll</title>
		<?php require_once("header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" ><a href="creat_article.php"> Article </a></li>
					<li role="presentation" class="active"><a> Poll </a></li>
					<li role="presentation"><a href="creat_multimedia.php"> Multimedia </a></li>
					<li role="presentation"><a href="creat_gallery.php"> Gallery </a></li>
				</ul>
			</h3>
			<br><br>
			<form class="form-horizontal" role="form" method="post" action="creat_poll.php">

				<br>
				<!-- #################################################################### Question #################################################################### -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="titleEnglish">Question (English):</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="titleEnglish" 
							   id="titleEnglish" 
							   value="<?php echo @$_POST["titleEnglish"]; ?>" 
							   placeholder="Enter a question in English" 
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
				<div class="form-group">
					<label class="control-label col-sm-2" for="titleArabic">Question (Arabic):</label>
					<div class="controls col-sm-10">
						<input type="text" 
							   name="titleArabic" 
							   id="titleArabic" 
							   value="<?php echo @$_POST["titleArabic"]; ?>" 
							   placeholder="Enter a question in Arabic" 
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
				<!-- #################################################################### Choice 1 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice1_en">Choice 1 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice1_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST["choice1_en"]; ?>" 
								   placeholder="Choice 1 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice1_ar)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice1_ar" 
								   id="choice1_ar" 
								   value="<?php echo @$_POST["choice1_ar"]; ?>" 
								   placeholder="Choice 1 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice1_en)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
				</div>
				<!-- #################################################################### Choice 2 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice2_en">Choice 2 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice2_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST["choice2_en"]; ?>" 
								   placeholder="Choice 2 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice2_ar)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice2_ar" 
								   id="choice2_ar" 
								   value="<?php echo @$_POST["choice2_ar"]; ?>" 
								   placeholder="Choice 2 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice2_en)" 
								   maxlength="32" 
								   required 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
				</div>
				<!-- #################################################################### Choice 3 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice3_en">Choice 3 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice3_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST["choice3_en"]; ?>" 
								   placeholder="Choice 3 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice3_ar)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice3_ar" 
								   id="choice3_ar" 
								   value="<?php echo @$_POST["choice3_ar"]; ?>" 
								   placeholder="Choice 3 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice3_en)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
				</div>
				<!-- #################################################################### Choice 3 #################################################################### -->
				<div>
					<hr>
					<div class="form-group">
						<label class="control-label col-sm-2" for="choice4_en">Choice 4 :</label>
						<div class="controls col-sm-5">
							<input type="text" 
								   name="choice4_en" 
								   id="choice1_en" 
								   value="<?php echo @$_POST["choice4_en"]; ?>" 
								   placeholder="Choice 4 in English" 
								   class="form-control" 
								   onBlur="valOption(this, choice4_ar)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
					<div class="form-group">
						<div class="controls col-sm-offset-2 col-sm-5">
							<input type="text" 
								   name="choice4_ar" 
								   id="choice4_ar" 
								   value="<?php echo @$_POST["choice4_ar"]; ?>" 
								   placeholder="Choice 4 in Arabic" 
								   class="form-control" 
								   onBlur="valOption(this, choice4_en)" 
								   maxlength="32" 
								   autocomplete="on">
							<span class="help-block">
								<ul>
								</ul>
							</span></div>
					</div>
				</div>
				<hr>
				<button type="submit" id="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<?php include ("Footer.php"); ?>
	</body>
</html>