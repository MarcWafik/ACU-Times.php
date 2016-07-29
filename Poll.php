<?php
require_once("ControlSession.php");
require_once("ControlFunctions.php");
Check_Login();

if(ValContent()){
    if(ValAllIsCorrect()){
		$FileLoc = "Data\Vote\question.file.txt";
		global $FileLoc;
		$data="";
		$myfile = fopen($FileLoc, "a") or die("Unable to open file!");
		$data=$_POST["question"]."~#*$%#".$_POST["choice1"]."~#*$%#".$_POST["choice2"]."\r\n";
		fwrite($myfile,$data);
		fclose($myfile);
		header("Location: SubmitQuestion.php");
    } 
}

function ValAllIsCorrect(){
     return   valTitle($_POST["question"])&&  valTitle($_POST["choice1"])&& valTitle($_POST["choice2"]) ; 
}

function ValContent(){
    return isset($_POST["question"])&&isset($_POST["choice1"])&&isset($_POST["choice2"]);
}
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
<title>ACU Times | Poll</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<div class="container">
	<h3>
		<ul class="nav nav-pills">
			<li role="presentation" ><a href="WriteArticle.php">Write Article</a></li>
			<li role="presentation" class="active"><a>Creat Poll</a></li>
			<li role="presentation"><a href="#">Multimedia</a></li>
		</ul>
	</h3>
	<br>
	<form class="form-horizontal" role="form" method="post" action="Poll.php">
	
		<div class="form-group">
			<label class="control-label col-sm-2" for="question">Quetion :</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" type="text" name="question" id="question" placeholder="" required onBlur="valQuestion(this,Validate_question)">
				<div id="Validate_question" name = "Validate_question" class="MyAlret"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="choice1">Choices :</label>
			<div class="col-sm-5">
				<div class="col-sm-12">
					<input type="text" class="form-control" type="text" name="choice1" id="choice1" placeholder="Choice 1" required onBlur="valChoice(this,Validate_choice1)">
					<div id="Validate_choice1" name = "Validate_choice1" class="MyAlret"></div>
				</div>
			</div>
		</div>




			<label for="chioices">Choices :</label>
			<input type="text" name="choice1" id="choice1" placeholder="Choice 1" required>
			<input type="text" name="choice2" id="choice2" class="form-control"  placeholder="Choice 2" required>
			
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<br>
<br>
<br>
<br>
<!---  <?php include ("Footer.php");?>---->
</body>
</html>