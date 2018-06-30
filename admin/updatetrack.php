<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); } 
require_once('db_connect.php');
$trackid=$_GET['trackid']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<meta name="description" content="Courier services by Vespa Shippings" />
<meta name="keywords" content="Courier, Wespa, Shippings, Cargo" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/ico" href="favicon.png" />
<script type="text/javascript" src="jquery-1.9.1.min.js"> </script>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="987" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" colspan="2" bgcolor="#FFCCCC"><div align="center">
    <h2><strong>ADMIN</strong></h2></div></td>
  </tr>
  <tr>
    <td width="344" height="50" bgcolor="#FFCCCC"><table width="288" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="92"><a href="vadmin.php">Admin Home</a></td>
        <td width="141">&nbsp;</td>
        <td width="55"><a title="log out of the admin panel" href="logout.php">Log Out</a> </td>
      </tr>
    </table></td>
    <td width="643" rowspan="2" valign="top">  <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="631" height="30"><h1 align="center">
            <?php if (array_key_exists('added', $_GET)) { echo "The new track info has been added successfully";} else {echo " ";} ?>
            <br />
            <br />
            This Shipment - <a style="font-size:14px" href="edittrack.php?trackid=<?php echo $trackid; ?>"> EDIT THIS SHIPMENT</a></h1> 
            <?php
$sql="SELECT * FROM users WHERE id=$trackid";
$result=mysql_query($sql);
?>         </td>
        </tr>
        <tr> 
          <td><table class="mainbox" width="98%" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr bgcolor="#999999">
              <td width="78" height="30"><div align="center"><strong>Tracking No.</strong></div></td>
              <td width="90"><div align="center"><strong>Sender</strong></div></td>
              <td width="96"> <div align="center"><strong>Receiver</strong></div></td>
              <td width="98"><div align="center"><strong>Item</strong></div></td>
              <td width="69"><div align="center"><strong>Origin</strong></div></td>
              <td width="73"><div align="center"><strong>Destination</strong></div></td>
              </tr> <?php
$rowspost=mysql_fetch_array($result)
?>
            <tr bgcolor="#FFFFCC">
              <td height="40" bgcolor="#FFCCFF"><div align="center"><a href="updatetrack.php?trackid=<?php echo $rowspost['id']; ?>"><?php echo $rowspost['track']; ?></a></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['sn']; ?></div>              </td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['rn']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['item']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['origin']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['desti']; ?></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><table class="mainbox" width="98%" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr bgcolor="#999999">
              <td width="78" height="30"><div align="center"><strong>Sender Address </strong></div></td>
              <td width="90"><div align="center"><strong>Sender Phone </strong></div></td>
              <td width="96"><div align="center"><strong>Receiver Address </strong></div></td>
              <td width="98"><div align="center"><strong>Receiver Phone </strong></div></td>
              <td width="69"><div align="center"><strong>Reference Number </strong></div></td>
              </tr>
            <tr bgcolor="#FFFFCC">
              <td height="40" bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['sa']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['sp']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['ra']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['rp']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['ref']; ?></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFCCCC">&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
            <h1>Shipment status Info</h1>
          </div></td>
        </tr>
        <tr>
          <td><?php
$getTotal = "SELECT COUNT(*) FROM status WHERE trackid=$trackid";
$total = mysql_query($getTotal);
$row2 = mysql_fetch_row($total);
$totalPix = $row2[0];
$curPage1=isset($_GET['curPage1']) ? $_GET['curPage1'] : 0;
define('SHOWMAX2', 20);
$startRow = $curPage1 * SHOWMAX2;
$sql="SELECT * FROM status WHERE trackid=$trackid ORDER BY id ASC LIMIT $startRow,".SHOWMAX2;
$result2=mysql_query($sql);
?>         </td>
        </tr>
        <tr> 
          <td><table class="mainbox" width="98%" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr bgcolor="#999999">
              <td width="107" height="30"><div align="center"><strong>Date</strong></div></td>
              <td width="103"><div align="center"><strong>Time</strong>(GMT)</div></td>
              <td width="148"> <div align="center"><strong>Location</strong></div></td>
              <td width="162"><div align="center"><strong>Details</strong></div></td>
              <td width="101"><div align="center"><strong>Status</strong></div></td>
              </tr> <?php
while($rowspost2=mysql_fetch_array($result2)) { // Start looping table row 
?>
            <tr bgcolor="#FFFFCC">
              <td height="40" bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost2['date']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost2['time']; ?></div>              </td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost2['location']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost2['details']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost2['status']; ?></div></td>
              </tr><?php
// Exit looping and close connection 
}
?>
          </table></td>
        </tr>
        <tr>
          <td><table width="453" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="261"><table width="180" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="180"><div id="sectionLinks">
                        <div align="center">
                          <?php
// create a back link if current page greater than 0
if ($curPage1 > 0) {
echo '<a href="'.$_SERVER['PHP_SELF'].'?curPage=1'.($curPage1-1).'"> 
<< Go back</a>';
}
// otherwise leave the cell empty
else {
echo '&nbsp;';
}
?>
                        </div>
                    </div></td>
                  </tr>
              </table></td>
              <td width="245"><table width="197" border="0" align="right" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="198"><div id="sectionLinks">
                        <div align="center">
                          <?php
// create a forward link if more records exist
if ($startRow+SHOWMAX2 < $totalPix) {
echo '<a href="'.$_SERVER['PHP_SELF'].'?curPage1='.($curPage1+1).'"> 
View older tracks >></a>';
} else {
echo '&nbsp;';
}
?>
                        </div>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFCCCC"><form action="workinfo.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('loc','','R','st','','R','det','','R');return document.MM_returnValue">
      <table width="296" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="296" height="30"><h1>Add New status Info to this shipment </h1></td>
        </tr>
        <tr>
          <td>Time<br />
            <input type="text" name="time" /></td>
        </tr>
        <tr>
          <td>Date<br />
            <input type="text" name="date" /></td>
        </tr>
        <tr>
          <td><label>
            Location
                <br />
              <input type="text" name="loc" />
          </label></td>
        </tr>
        <tr>
          <td>Details<br /> 
            <label>
            <textarea name="det" cols="35" rows="3"></textarea>
            </label></td>
        </tr>
        
        
        <tr>
          <td>Status<br /> 
            <input type="text" name="st" /></td>
        </tr>
        <tr>
          <td><input type="hidden" name="trackid" value="<?php echo $trackid; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label>
            <input id="buttonnew" type="submit" name="Submit" value="Add Info" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="right">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><a title="delete this shipment entirely" href="workdelete.php?trackid=<?php echo $trackid; ?>">Delete this shipment</a> </p>
          </div></td>
        </tr>
      </table>
    </form>    </td>
  </tr>
  <tr>
    <td bgcolor="#006600">&nbsp;</td>
    <td bgcolor="#006600">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>