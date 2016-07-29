<?php
function printPortofolio_1Line ( $IMG , $Title , $Link , $Breif , $Day , $Month , $Year ){
	$IMG="Data\Articles\\".$IMG;
echo 
'<div class="row">
	<div class="col-md-3"> <a href="'.$Link.'"> <img class="img-responsive img-portofolio-1line" src="'.$IMG.'"> </a> </div>
	<div class="col-md-9">
		<h5 class="pull-right">'.$Day.'/'.$Month.'/'.$Year.' <span class="glyphicon glyphicon-time"></span></h5>
		<a href="'.$Link.'"><h3>'.$Title.'</h3></a>
		<p>'.$Breif.'</p>
		<a class="btn btn-primary pull-right" href="'.$Link.'">Read more <span class="glyphicon glyphicon-chevron-right"></span></a> </div>
</div>
<hr>';}

function printPortofolio_3Line ( $IMG , $Title , $Link , $Breif , $Day , $Month , $Year ){
	$IMG="Data\Articles\\".$IMG;
echo 
'<div class="col-md-4 img-portfolio" style="padding:20px">
	<a href="'.$Link.'">
		<img class="img-responsive img-hover" src="'.$IMG.'" style="max-height:200px">
	</a>
	<h3>
		<a href="'.$Link.'">'.$Title.'</a>
	</h3>
	<h5>'.$Day.'/'.$Month.'/'.$Year.' <span class="glyphicon glyphicon-time"></span></h5>
	<p>'.$Breif.'</p>
	<a class="btn btn-primary pull-right" href="'.$Link.'">Read more <span class="glyphicon glyphicon-chevron-right"></span></a>
</div>';}		
			
function printPortofolio_1LineLarge ( $IMG , $Title , $Link , $Breif , $Day , $Month , $Year ){
	$IMG="Data\Articles\\".$IMG;
	echo 
	'<div class="row">
		<div class="col-md-7">
			<img class="img-responsive img-rounded" style="max-height:350px" src="'.$IMG.'">
		</div>
		<div class="col-md-5">
			<h2>'.$Title.'</h2>
			<h5>'.$Day.'/'.$Month.'/'.$Year.' <span class="glyphicon glyphicon-time"></span></h5>
			<p>'.$Breif.'</p>
			<a class="btn btn-primary btn-lg" href="'.$Link.'">Read more <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>';}
?>