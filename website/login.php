<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require 'database.php';
	// if the email and password are not emty it will continue
	$email = $_POST['email'];
	$password = $_POST['password'];

	// the user id is selected from the database if the email&password are recognized
	$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$rows = $stmt->fetchAll();

	if(count($rows) == 1 && password_verify($password, $rows[0]['password'])) {
		session_start();
		$_SESSION['id'] = session_id();
		// $_SESSION["user_name"] = $rows[0]['name'];
		header("Location: secretpage.php");
	//If the data has been inserted corectly the user will be sent to index page, and will get the message, that he has been succesfully logged in*/
	} else {
		//else, so if not, if the password or email is incorect and it can't be found in the database the user will reciver message "Sorry, there has been an error, try again.."*/
		echo "Wrong username/password!";
	}
}
?>




<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Below</title>
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body>
<div class="header">
<a href="index.php"> Agata's app</a>
</div>

<h1>Login </h1>
<span>or <a href="register.php">register here</a></span>
<!--I added that link so the page is easier to navigate for the user, if he is not registered yet, he can go straigth to register subpage, he doesn't have to look fo it-->

<form action ="login.php" method="POST">

<input type="text" placeholder="Enter your email" name="email" required="true">

<input type="password" placeholder="and password" name="password" required="true">

<input type="submit">
</form>

</body>
</html>
