<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); } 
require_once('db_connect.php'); 
$trackid=$_POST['trackid'];

$sn=$_POST['sn'];
$rn=$_POST['rn'];
$sa=$_POST['sa'];
$ra=$_POST['ra'];
$sp=$_POST['sp'];
$rp=$_POST['rp'];
$ref=$_POST['ref'];
$item=$_POST['item'];
$origin=$_POST['ori'];
$desti=$_POST['desti'];

$date=$_POST['date'];

$update="UPDATE users SET sn='$sn', rn='$rn', sa='$sa', ra='$ra', sp='$sp', rp='$rp', ref='$ref', item='$item', origin='$origin', desti='$desti', date='$date' WHERE id='$trackid'";
$result2=mysql_query($update);

echo "<script language='javascript'> alert('Record updated successfully')</script> 
 <script>window.location='updatetrack.php?trackid=$trackid'</script>"; 
 exit();
?>