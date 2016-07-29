<!DOCTYPE html>
<html lang="en">
<head>

<title>ACU Times | Title</title>

<style>
#sidebar-wrapper {
    overflow-y:scroll;
    height:700px;
}
</style>

<?php require_once("Header.php");?>
</head>
<body>
<?php include ("Navbar.php");?>
<?php require_once("ControlMultimedia.php");?>
<div class="container">
 <div class="col-md-8 ">
   <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" id="myvideo" src="<?php echo $AllVid[0][4];?>"frameborder="0" allowfullscreen></iframe>
  </div>
</div>
  <div class="col-md-4 ">
  <dl class="dl-horizontal">
  <div id="sidebar-wrapper">
  <ol>
  <li>
  <dt><img class="img-responsive"  src="<?php echo $AllVid[0][5]?>"alt="img">
  </dt>
  <dd><a href="src="<p><?php echo $AllVid[0][1]?></p></a></dd>
  </li>
  <br>
  <li>
  <dt><img class="img-responsive" src="<?php echo $AllVid[1][5]?>" alt="img">
  </dt>
  <dd><a href="src="<p><?php echo $AllVid[1][1]?></p></a></dd>
  </li>
  <br>
  <li>
  <dt>
  <img class="img-responsive" src="<?php echo $AllVid[2][5]?>" alt="img">
  </dt>
  <dd><a href="src="<p><?php echo $AllVid[2][1]?></p></a></dd>
  </li>
  <br>
  <li>
  <dt>
  <img class="img-responsive" src="<?php echo $AllVid[3][5]?>" alt="img">
  </dt>
  <dd><a href="src="<p><?php echo $AllVid[3][1]?></p></a></dd>
  </li>
  <br>
  <li>
  <dt>
  <img class="img-responsive" src="<?php echo $AllVid[4][5]?>" alt="img">
  </dt>
  <dd><a href="src="<p><?php echo $AllVid[4][1]?></p></a></dd>
  </li>
  <br>
  <li>
  <dt>
  <img class="img-responsive" src="<?php echo $AllVid[5][5]?>" alt="img">
  </dt>
  <dd><a href="src="<p><?php echo $AllVid[5][1]?></p></a></dd>
   </li>
 </ol>
 </dl>
  </div>
 </div>
</div>
<center>
<a href="">
<button type="button" class="btn btn-primary btn-arrow-left" onClick="previous"> Previous </button>
</a>
<a href="">
<button type="button" class="btn btn-primary btn-arrow-right" onClick="next">Next </button>
</center>
<script>
function previous()
{
	window.history.back()
}
function next()
{
	window.history.forward()
}
</script>
<?php include ("Footer.php");?>
</body>
</html>