<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); } 
require_once('db_connect.php'); 

$loc=$_POST['loc'];
$det=$_POST['det'];
$st=$_POST['st'];
$trackid=$_POST['trackid'];
$date=$_POST['date'];
$time=$_POST['time'];

$insert="INSERT INTO status(date, time, location, details, status, trackid) VALUES ('$date', '$time', '$loc', '$det', '$st', '$trackid')";
$result2=mysql_query($insert);

header("location:updatetrack.php?trackid=$trackid&added=yes");
?>