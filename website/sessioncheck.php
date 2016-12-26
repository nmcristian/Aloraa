<?php
session_start();
// print_r($_SESSION);
if(!isset($_SESSION['id'])) {
   header('Location: /login.php');
}
?>
