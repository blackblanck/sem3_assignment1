<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign-up</title>
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
	
	
	</style>
</head>

<body>
<?php require('menu.php'); ?>


<div class="login">
<h2 class="login-header">Sign-up</h2>
<form class="login-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Add new user</legend>
    	<input name="un" type="text" placeholder="Username" required />
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input name="em" type="email" placeholder="E-mail"  required/>
    	<input type="submit" name="submit" value="Create user" />
    	
	</fieldset>
	<p class="message" style="text-align:center; color:red;"> Upon succesful completion of your registry, you will be directed to login page</p>
</form>
	
	<?php
	require_once('db_con.php');
	
	
	if(!empty(filter_input(INPUT_POST, 'submit'))) {
	$un = filter_input(INPUT_POST, 'un') or die('Username not accepted');
	$pw = filter_input(INPUT_POST, 'pw') or die('Password not accepted');
	$pw = password_hash($pw, PASSWORD_DEFAULT);  // hash and salt the password
	$em = filter_input(INPUT_POST, 'em', FILTER_VALIDATE_EMAIL) or die('a legit address please');
	
//echo 'Created user: '.$un.' with e-mail address: ' .$em;
	
	$sql = 'INSERT INTO login (username, pwhash, email) VALUES (?,?,?)';
	$stmt = $link->prepare($sql);  //storing in stmt
	$stmt->bind_param('sss', $un, $pw, $em);
	$stmt->execute();

	if($stmt->affected_rows >0){
		
		echo "<script type='text/javascript'>window.top.location='login.php';</script>";
		echo ' user ['.$un.'] is added. Welcome '.$un.', normally I would expect you to receive a confirmation mail to login however this one is on me :), please proceed with login';
		
	}
	else {
		echo 'Error adding user ['.$un.'] this user already exists';
	}


		
}
?>

	</div>




<?php require('footer.php'); ?>

</body>
</html>