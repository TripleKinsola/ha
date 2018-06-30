<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); } 
require_once('db_connect.php'); 


$trackid=$_GET['trackid'];

$delete="DELETE from users WHERE id='$trackid'";
$result1=mysql_query($delete);

header("location:vadmin.php");
?>