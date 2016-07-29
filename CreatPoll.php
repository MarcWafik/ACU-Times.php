<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ACU Times | Creat Poll</title>
		<?php require_once("Header.php"); ?>
		<script src="js/Validate.js"></script>
	</head>
	<body>
		<?php include ("Navbar.php"); ?>
		<div class="container">
			<h3>
				<ul class="nav nav-pills">
					<li role="presentation" ><a href="CreatArticle.php"> Article </a></li>
					<li role="presentation" class="active"><a> Poll </a></li>
					<li role="presentation"><a href="CreatMultimedia.php"> Multimedia </a></li>
				</ul>
			</h3>
			<br>
			<ul class="nav nav-tabs">
				<li  class="active"><a data-toggle="tab" href="#English">English</a></li>
				<li><a data-toggle="tab" href="#Arabic">Arabic</a></li>
			</ul>
			<form class="form-horizontal" role="form" method="post" action="CreatPoll.php">
				<!-- #################################################################### tab1 #################################################################### --> 
				<!-- #################################################################### tab1 #################################################################### --> 
				<!-- #################################################################### tab1 #################################################################### -->
				<div class="tab-content">
					<div id="English" class="tab-pane fade in active"> <br>
						<br>
						<!-- #################################################################### Question #################################################################### -->
						<div class="form-group">
							<label class="control-label col-sm-2" for="Question_en">Question :</label>
							<div class="controls col-sm-10">
								<input type="text" name="Question_en" id="Question_en" value="<?php echo @$_POST[""]; ?>" placeholder="Enter question" class="form-control" onBlur="valTitle(this)" maxlength="128" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<!-- #################################################################### Choices #################################################################### -->
						<div class="form-group">
							<label class="control-label col-sm-2" for="choice1_en">Choices :</label>
							<div class="controls col-sm-5">
								<input type="text" name="choice1_en" id="choice_en1" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 1" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<div class="form-group">
							<div class="controls col-sm-offset-2 col-sm-5">
								<input type="text" name="choice2_en" id="choice2_en" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 2" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<div class="form-group">
							<div class="controls col-sm-offset-2 col-sm-5">
								<input type="text" name="choice3_en" id="choice3_en" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 3" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<div class="form-group">
							<div class="controls col-sm-offset-2 col-sm-5">
								<input type="text" name="choice4_en" id="choice4_en" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 4" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
					</div>
					<!-- #################################################################### tab2 #################################################################### --> 
					<!-- #################################################################### tab2 #################################################################### --> 
					<!-- #################################################################### tab2 #################################################################### -->
					<div id="Arabic" class="tab-pane fade"> <br>
						<br>
						<!-- #################################################################### Question #################################################################### -->
						<div class="form-group">
							<label class="control-label col-sm-2" for="Question_ar">Question :</label>
							<div class="controls col-sm-10">
								<input type="text" name="Question_ar" id="Question_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Enter the question" class="form-control" onBlur="valTitle(this)" maxlength="128" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<!-- #################################################################### Choices #################################################################### -->
						<div class="form-group">
							<label class="control-label col-sm-2" for="choice1_ar">Choices :</label>
							<div class="controls col-sm-5">
								<input type="text" name="choice1_ar" id="choice1_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 1" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<div class="form-group">
							<div class="controls col-sm-offset-2 col-sm-5">
								<input type="text" name="choice2_ar" id="choice2_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 2" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<div class="form-group">
							<div class="controls col-sm-offset-2 col-sm-5">
								<input type="text" name="choice3_ar" id="choice3_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 3" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
						<div class="form-group">
							<div class="controls col-sm-offset-2 col-sm-5">
								<input type="text" name="choice4_ar" id="choice4_ar" value="<?php echo @$_POST[""]; ?>" placeholder="Choice 4" class="form-control" onBlur="valOption(this)" maxlength="32" required autocomplete="on">
								<span class="help-block"></span></div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		</div>
		<!---  <?php include ("Footer.php"); ?>---->
	</body>
</html>