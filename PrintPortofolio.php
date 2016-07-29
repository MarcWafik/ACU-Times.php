<?php
function printPortofolio_1Line ( $IMG , $Title , $Link , $Breif , $Day , $Month , $Year ){
echo 
"<div class='row'>
	<div class='col-md-3'> <a href='{$Link}'> <img class='img-responsive img-portofolio-1line' src='http://placehold.it/700x400' alt=''> </a> </div>
	<div class='col-md-9'>
		<h5 class='pull-right'>{$Day}/{$Month}/{$Year} <span class='glyphicon glyphicon-time'></span></h5>
		<a href='{$Link}'><h3>{$Title}</h3></a>
		<p>{$Breif}</p>
		<a class='btn btn-primary pull-right' href='{$Link}'>Read more <span class='glyphicon glyphicon-chevron-right'></span></a> </div>
</div>
<hr>";
}
?>