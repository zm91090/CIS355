<?php
session_start();
require "database.php";
if ($_GET) $errorMessage = $_GET['errorMessage'];
else $errorMessage = '';
if($_POST) {
	$success = false;
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$password = MD5($password);
	
	$pdo = Database::connect();
	
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
	//echo $username . ' ' . $password; exit();
	//sql command to access the record
	$sql = "Select * FROM customers WHERE username = '$username' AND password = '$password' Limit 1";
	$q = $pdo->prepare($sql);
	
	$q->execute(array());
	$data = $q->fetch(PDO::FETCH_ASSOC);
	
	//print_r ($data) ; exit() ;
	
	if($data) {
		//sets the username
		$__SESSION ["username"] = $username;
		header("Location: success.php");
	}
	else{
		header("Location: login.php?errorMessage=Invalid");
		exit();
	}
}
?>
<h1> Log in</h1>
<form class ="form-horizontal" action ="login.php" method="post">

	<div class = "control-group">
		<label class = "control-label">Username (Email)</label>
		<div class="controls">
			<p><?php echo $errorMessage;?></p>
			<input name="username" type="text" placeholder="me@email.com" required>
			<input name="password" type="password" required>
			<button type="submit" class = "btn btn-success">Sign in</button>
			<a href='logout.php'> Log out </a>
			</div>
			</div>
	</form>