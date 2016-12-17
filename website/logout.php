<?php

session_start();

// remove all session variables
session_unset();

// destroy the session
// session_destroy();

header("Location: index.php");
/*If the session is going then destroy the session and relocate the user, send him to the index.php page*/
?>
