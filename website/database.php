<?php
$dbname = 'allora';
$dbuser = 'adminallora';
$dbpass = 'cbasucks';
$dbhost = 'db4free.net:3306';

/*There are all og the information that are needed to get information from the database: we can see the server, username, password and name of the datbaase that we are taking messages, the sorce of the data about the users*/
// $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
// mysql_select_db($dbname) or die("Could not open the db '$dbname'");
// echo 'Successfully connected to db!';

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    // echo 'Successfully connected to db!';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

?>
