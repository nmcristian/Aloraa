<?php
session_start();
if(isset($_SESSION['id'])) {
   $logged_in = true;
} else {
	$logged_in = false;
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your Web App</title>

<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<!--We are using this stylesheet and this font in all on the pages, that's why is implemented in all of the codes. -->
</head>

<body>
<div class="header">
<a href="index.php">Agata's app</a>
</div>

<br />First page / Landing page, no session required here
<br /><br />
<a href="secretpage.php">Secret page, you can't access if you're not logged in</a>
<br /><br />

<?php if( $logged_in ): ?>
  <a href="logout.php">Logout</a>
<?php else: ?>
	<a href= "login.php">Login</a> or
	<a href= "register.php">Register</a>
<?php endif; ?>

</body>
</html>
