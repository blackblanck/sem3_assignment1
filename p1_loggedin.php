<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href= "includes/css/grid.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Page 1</title>
<style>
	
	@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300);
	
	.info {
	padding-left: 18px;
	text-align:left;
	font-family: 'roboto condensed';
	font-size: 18px;
	font-weight:900;
	margin-top:1vh;
	color:red;
	}
	
		
	.main {
	padding-left:16px;
	color:black;
	text-align:left;
	font-family: 'roboto condensed';
	font-size: 18px;
	}
	

	</style>
</head>

<body>
<?php require('menu_loggedin.php'); ?>


  <div class="info">
  	
  	<?php
	
	if (!empty($_SESSION['uid'])){
		echo 'Logged in as '.$_SESSION['un'];
		
	}
	else {
		echo 'Not logged in...';
	}

?>

	</div>

<div class="main">
<h1> Page 1</h1>
<p> bla bla bla</p>
</div>
<?php require('footer.php'); ?>
</body>
</html>