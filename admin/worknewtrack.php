<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); }
require_once('db_connect.php');
 $aid=$_SESSION['admin'];
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

$initialtrack='2073814720';

$getTotal = 'SELECT COUNT(*) FROM users';
$total = mysql_query($getTotal);
$row2 = mysql_fetch_row($total);
$totalPix = $row2[0];
$curPage=0;
define('SHOWMAX6', 1);
$startRow = $curPage * SHOWMAX6;
$sql="SELECT * FROM users ORDER BY id DESC LIMIT $startRow,".SHOWMAX6;
$result20=mysql_query($sql);
$row20=mysql_fetch_array($result20);
$lasttrack=$row20['track'];

if(empty($lasttrack)){$track=$initialtrack;}
else {$track=$lasttrack+104;}

$insert="INSERT INTO users(aid, sn, rn, sa, ra, sp, rp, ref, item, date, track, origin, desti) VALUES ('$aid', '$sn', '$rn', '$sa', '$ra', '$sp', '$rp', '$ref', '$item', '$date', '$track', '$origin', '$desti')";
$result2=mysql_query($insert);

$sql="SELECT * FROM users WHERE track=".$track."";
$result21=mysql_query($sql);
$row21=mysql_fetch_array($result21);
$id=$row21['id'];

header("location:updatetrack.php?trackid=$id");
?>
