<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href= "includes/css/grid.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300);

	.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
	font-family: 'roboto condensed';
	margin-top: 5vh;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

.login-header {
  background: #333;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
	margin-bottom: 15px;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #333;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #8887C1;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
	
}
	
	.message { 
			text-align: center;
	}	
	</style>

</head>

<body>

<?php require('menu.php'); ?>



<div class="login">
<h2 class="login-header">Log in</h2>
<form class="login-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Login</legend>
    	<input name="un" type="text" placeholder="Username" required />
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input type="submit" name="submit" value="Login" />
	</fieldset>
	
	<p class="message">Not registered yet? <a href="adduser.php">Create an account</a></p>
</form>
<?php
require_once('db_con.php');
	
if(!empty(filter_input(INPUT_POST, 'submit'))) {

	
	
	$un = filter_input(INPUT_POST, 'un') or die('incorrect useername');
	$pw = filter_input(INPUT_POST, 'pw') or die('incorrect password');
	//$password = password_hash($password, PASSWORD_DEFAULT); // hash and salt the password 
	
	
	$sql = 'SELECT username, pwhash FROM login WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);

	while ($stmt->fetch()) {} // fill result variables
	
	if (password_verify($pw, $pwhash)){
		
		echo 'You are now logged in as user '.$uid;
		$_SESSION['uid'] = $uid; 
		$_SESSION['un'] = $un;
		
		
		echo "<script type='text/javascript'>window.top.location='secretinfo.php';</script>";
	}
	else {
		echo 'something went wrong, please make sure you enter correct username and password';
	}
}
?>
</div>

<?php require('footer.php'); ?>



</body>
</html>