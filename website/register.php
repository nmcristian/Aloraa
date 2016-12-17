
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require 'database.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	if ($password != $confirm_password) {
		echo 'The 2 passwords do not match!';
	} else {
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
		//The password has to be hashed, so noone who can get to our database can see it. It's safer that way. There are many different ways of hasing the password, I'm using "PASSWORD_BCRYPT"*/

		$stmt = $conn->prepare("INSERT INTO users (email, password, name) VALUES (:email, :password, :name)");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $hashedPassword);
		$stmt->bindParam(':name', $name);

		if ($stmt->execute()) {
			// echo 'Successfully created new user';
			session_start();
			$_SESSION['id'] = session_id();
			header("Location: index.php");
		} else {
			echo 'Sorry there must have been an issue creating your account';
		}
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Register Below</title>
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body>
<div class="header">
<a href="index.php"> Agata's app</a>
</div>

<h1> Register</h1>
<span>or <a href="login.php">Login here</a></span>

<form action ="register.php" method="POST">
	<input type="text" placeholder="Enter your name" name="name" required="true">
	<input type="text" placeholder="email" name="email" required="true">
	<input type="password" placeholder="password" name="password" required="true">
	<input type="password" placeholder="re-type password" name="confirm_password" required="true">
	<!--The user has to fill in all of the places, as well as confirm the password in order to be added to database-->
	<input type="submit">
</form>

</body>
</html>
