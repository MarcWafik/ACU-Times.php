<?php require_once 'autoload.php';
?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>             
			</button>
			<a class="navbar-brand" href="index.php">ACU Times</a> </div>
		<div class="collapse navbar-collapse" id="myNavbar">

			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>

				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="category.php?Category=News">News <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="category.php">Category 1</a></li>
						<li><a href="category.php">Category</a></li>
						<li><a href="category.php">Category</a></li>
					</ul>
				</li> 
				<?php //foreach($CategoryList as $Category){PrintCategory($Category);}?>
				<li><a href="multimedia.php">Multimedia</a></li>
				<li><a href="gallery.php">Gallery</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
					<ul class="dropdown-menu">
						<li>
							<form action="search.php" method="get" class="Search-navbar input-group">
								<input type="text" class="form-control" placeholder="Search for..." id="Search" name="Search">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
								</span> 
							</form>
						</li>
					</ul>
				</li>
				<?php
				if (User::isLogin()) {
					echo
					'<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span> '
					. User::getSessionUserFullName() . ' <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="profile.php">Profile</a></li>
		<li><a href="creat_article.php">Write Article</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="polls.php">Pollss</a></li>
		<li><a href="redir_logout.php">Logout</a></li>
	</ul>
</li>';
				} else {
					echo'<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
				}
				?>

			</ul>
		</div>
	</div>
</nav>
<div class="clearfix"></div>