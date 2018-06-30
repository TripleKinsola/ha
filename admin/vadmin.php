<?php session_start();
if (!isset($_SESSION['admin'])) { header('location:tracking.php'); }
require_once('db_connect.php'); ?>
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
        <td width="92"><a href="vadmin.php">Admin Home</a> </td>
        <td width="141"><a title="Go to company Email" href="http://www.hamiltongs.com/webmail">Access Company Mail </a></td>
        <td width="55"><a title="Log out of the admin panel" href="logout.php">Log Out</a> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="643" rowspan="2" valign="top">  <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="631" height="30"><h1 align="center"><br />
            Recent Shipments</h1>
          <?php
		  $aid=$_SESSION['admin'];
$getTotal = 'SELECT COUNT(*) FROM users WHERE aid="$aid"';
$total = mysql_query($getTotal);
$row2 = mysql_fetch_row($total);
$totalPix = $row2[0];
$curPage1=isset($_GET['curPage1']) ? $_GET['curPage1'] : 0;
define('SHOWMAX2', 10);
$startRow = $curPage1 * SHOWMAX2;
$sql="SELECT * FROM users WHERE aid='$aid' ORDER BY id DESC LIMIT $startRow,".SHOWMAX2;
$result=mysql_query($sql);
?>         </td>
        </tr>
        <tr>
          <td><table class="mainbox" width="98%" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr bgcolor="#999999">
              <td width="78" height="30"><div align="center"><strong>Tracking No.</strong></div></td>
              <td width="90"><div align="center"><strong>Sender</strong></div></td>
              <td width="96"><div align="center"><strong>Receiver</strong></div></td>
              <td width="98"><div align="center"><strong>Item</strong></div></td>
              <td width="69"><div align="center"><strong>Origin</strong></div></td>
              <td width="73"><div align="center"><strong>Destination</strong></div></td>
              <td width="79"><div align="center"><strong>Date of Departure</strong></div></td>
            </tr>
            <?php
while($rowspost=mysql_fetch_array($result)) { // Start looping table row
?>
            <tr bgcolor="#FFFFCC">
              <td height="40" bgcolor="#FFCCFF"><div align="center"><a href="updatetrack.php?trackid=<?php echo $rowspost['id']; ?>"><?php echo $rowspost['track']; ?></a></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['sn']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['rn']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['item']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['origin']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['desti']; ?></div></td>
              <td bgcolor="#FFCCFF"><div align="center"><?php echo $rowspost['date']; ?></div></td>
            </tr>
            <?php
// Exit looping and close connection
}
?>
          </table></td>
        </tr>
        <tr>
          <td><div align="center">
            <table width="453" border="0" align="center" cellpadding="0" cellspacing="0">
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
            </table>
          </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFCCCC"><form action="worknewtrack.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('sn','','R','ori','','R','desti','','R','rn','','R','sa','','R','item','','R','ra','','R');return document.MM_returnValue">
      <table width="296" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="296" height="30"><h1>Add New Shipment </h1></td>
        </tr>
        <tr>
          <td><label>
            Sender Full Name
                <br />
              <input type="text" name="sn" />
          </label></td>
        </tr>
        <tr>
          <td>Sender Address
            <label>
            <textarea name="sa" cols="35" rows="3"></textarea>
            </label></td>
        </tr>
        <tr>
          <td>Sender Phone
            No.<br />
            <input type="text" name="sp" /></td>
        </tr>
        <tr>
          <td>Reference Number<br />
            <input type="text" name="ref" /></td>
        </tr>
        <tr>
          <td>Item Description
            <br />
            <textarea name="item" cols="35" rows="2"></textarea></td>
        </tr>
        <tr>
          <td>Origin<br />
            <input type="text" name="ori" /></td>
        </tr>
        <tr>
          <td>Destination<br />
            <input type="text" name="desti" /></td>
        </tr>
        <tr>
          <td>Receiver Full Name<br />
            <input type="text" name="rn" /></td>
        </tr>
        <tr>
          <td>Receiver Address
            <textarea name="ra" cols="35" rows="3"></textarea></td>
        </tr>
        <tr>
          <td>Receiver Phone No. <br />
            <input type="text" name="rp" /></td>
        </tr>
        <tr>
          <td>Date of Departure<br />
            <input type="text" name="date" /></td>
        </tr>
        <tr>
          <td><label>
            <input id="buttonnew" type="submit" name="Submit" value="Add Shipment" />
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>    </td>
  </tr>
  <tr>
    <td bgcolor="#006600">&nbsp;</td>
    <td bgcolor="#006600">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
