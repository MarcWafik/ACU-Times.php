<?php require_once("PrintPortofolio.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ACU Times | Title</title>
<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<!-- content -->

<div class="container">
	<!-------------------------------- advSearch -------------------------------->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="input-group" id="adv-search" role="form" action="Search.php" method="get">
					<input id="advSearch" name="advSearch" type="text" class="form-control" placeholder="Search our website" />
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<div class="dropdown dropdown-lg">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
								<div class="dropdown-menu dropdown-menu-right" role="menu">
									<div class="form-horizontal">
										<div class="form-group">
											<label for="advCategory">Category</label>
											<select class="form-control" id="advCategory" name="advCategory">
												<option value="" selected>All</option>
												<optgroup label="News">
												<option value="">World News</option>
												<option value="">ACU College News</option>
												</optgroup>
												<optgroup label="Art">
												<option value="">Cinema</option>
												<option value="">Drama</option>
												<option value="">Theater</option>
												</optgroup>
												<optgroup label="Sport">
												<option value="">Local Footaball</option>
												<option value="">International Football</option>
												<option value="">Other</option>
												</optgroup>
												<option value="">Interviews</option>
												<option value="">Tech &amp; Science</option>
												<option value="">Economy</option>
												<option value="">Multimedia</option>
												<option value="">Gallery</option>
											</select>
										</div>
										<div class="form-group">
											<label for="Date">Date</label>
											<select class="form-control" id="advDate" name="advDate">
												<option value="0" selected>Any</option>
												<option value="7">past week</option>
												<option value="31">past month</option>
												<option value="365">past year</option>
											</select>
										</div>
										<div class="form-group">
											<label for="contain">Author</label>
											<input class="form-control" type="text" id="advAuthor" name="advAuthor"/>
										</div>
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-------------------------------- Articles -------------------------------->
	<div class="container">
		<hr>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
		<?php printPortofolio_1Line (); ?>
	</div>
	<!-------------------------------- pagination -------------------------------->
	<div class="text-center center-block">
		<ul class = "pagination">
			<li><a href = "#">&laquo;</a></li>
			<li><a href = "?Page=1">1</a></li>
			<li><a href = "#">&raquo;</a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<?php include ("Footer.php");?>
</body>
</html>