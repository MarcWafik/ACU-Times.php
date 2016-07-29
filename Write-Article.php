<!DOCTYPE html>

<html><head>
<title>ACU Times | Write Article</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/mediaqueries.css" type="text/css" media="all">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>

 <script>
  tinymce.init({
  selector: '#article',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
 <!-- change appearance-->
 tinymce.init({
  selector: '#article',  // change this value according to your HTML
  color_picker_callback: function(callback, value) {
    callback('#FF00FF');
  }
});
<!-- spell check-->
tinymce.init({
  selector: '#article',  // change this value according to your HTML
  browser_spellcheck: true
});
<!-- color picker-->
tinymce.init({
  selector: "#article",  // change this value according to your html
  plugins: "textcolor",
  toolbar: "forecolor backcolor"
});


  </script>
</head>
<body>
<?php include ("Header.html");?>
<!-- content -->

<div class="wrapper row3">
	<div id="container"> 
		<!-- ################################################################################################ -->
		<div class="pad"> 
			<!-- ################################################################################################ --> 
			<!-- content body -->

  <form method="post">
<!--<div style="display:inline; position:relative">
  <p>Language :</p>

  <input type="radio" name="lang">Arabic
    <input type="radio" name="lang">English
</div>-->
<textarea id="article">
  
</textarea>  
  </form>
			
		  <!-- / content body --> 
			<!-- ################################################################################################ -->
			<div class="clear"></div>
	  </div>
		<!-- ################################################################################################ --> 
  </div>
</div>
<?php include ("Footer.html");?>
</body>
</html>