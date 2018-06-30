<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); } 
// run this script only if the logout button has been clicke
require_once('db_connect.php');

// empty the $_SESSION array
$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), '', time()-86400, '/');
}

session_destroy();
header('Location:tracking.php');
exit;
?>