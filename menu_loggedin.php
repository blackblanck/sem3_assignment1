
<style>	
@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300);
	
body{
	margin:0;
	}
	
.banner {
	background-color:transparent;
	background-image:url(images/banner.png);
	background-repeat: no-repeat;
	background-size: cover;
	width:100%;
	vertical-align: center;
	text-align: center;
	height: 20vh;
	margin-top:-5vh;
	}
	
	

h2 {
	font-family: 'roboto condensed';
	text-align: center;
	padding-top: 12vh;
	font-size: 40px;
	font-weight:900;
	color:white;
		}
	

.topnav {
  	overflow: hidden;
  	background-color: #333;
	font-family: 'roboto condensed';
}

.topnav a {
  	float: left;
  	display: block;
  	color: #f2f2f2;
  	text-align: center;
	padding: 14px 16px;
  	text-decoration: none;
  	font-size: 20px;
		
}

.topnav a:hover {
  	background-color: #ddd;
  	color: black;
	font-weight:600;
}

.topnav a.active {
    background-color: #67666A;
    color: white;
}
	
.topnav .icon {
  	display: none;
	
}
	
	/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 600px) {
  	.topnav a:not(:first-child) {display: none;}
  	.topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  	.topnav.responsive {position: relative;}
  	.topnav.responsive a.icon {
    position: absolute;
    right: 0;
	top: 0;

		
  }
  	.topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
	

  }
}

	a.log  {
		color: red;
	}	
	
	.icon {
		font-size:15px;
	}
</style>


<?php 
$fn = basename($_SERVER['PHP_SELF']);
//if ($fn == 'p2.php') {
//	echo 'active';
//}

//echo 'active'
?>
<div class="banner">

<h2>ASSIGNMENT 1</h2>
  
</div>


<div class="topnav" id="myTopnav"> 

<a class="menu <?= ($fn=='index_loggedin.php')?' active':'' ?>" href="index_loggedin.php">Home</a>
<a class="menu <?= ($fn=='p1_loggedin.php')?' active':'' ?>" href="p1_loggedin.php">Page 1</a>
<a class="menu <?= ($fn=='p2_loggedin.php')?' active':'' ?>" href="p2_loggedin.php">Page 2</a>
<a class="menu <?= ($fn=='p3_loggedin.php')?' active':'' ?>" href="p3_loggedin.php">Page 3</a>
<a class="menu <?= ($fn=='p4_loggedin.php')?' active':'' ?>" href="p4_loggedin.php">Page 4</a>
<a class="menu icon" href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
<a class="menu log <?= ($fn=='logout.php')?' active':'' ?>" href="logout.php">Logout</a>

</div>



<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
