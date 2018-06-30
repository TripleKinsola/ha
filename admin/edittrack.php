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
    <td width="655" height="50" bgcolor="#FFCCCC"><table width="288" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="92"><a href="vadmin.php">Admin Home</a> </td>
        <td width="141"></td>
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
    <td width="332" rowspan="2" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFCCCC"><form action="workedittrack.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('sn','','R','ori','','R','desti','','R','rn','','R','sa','','R','item','','R','ra','','R');return document.MM_returnValue">
      <table width="296" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
           <?php
$sql="SELECT * FROM users WHERE id=$trackid";
$result=mysql_query($sql);
$rowspost=mysql_fetch_array($result)
?>
          <td width="296" height="30"><h2>EDIT  SHIPMENT <strong><?php echo $rowspost['track']; ?></strong></h2></td>
        </tr>
        <tr>
          <td><label>
            Sender Full Name
                <br />
              <input type="text" name="sn" value="<?php echo $rowspost['sn']; ?>" />
          </label></td>
        </tr>
        <tr>
          <td>Sender Address
            <textarea name="sa" cols="35" rows="3"><?php echo $rowspost['sa']; ?></textarea></td>
        </tr>
        <tr>
          <td>Sender Phone            
            No.<br />
            <input type="text" name="sp" value="<?php echo $rowspost['sp']; ?>" /></td>
        </tr>
        <tr>
          <td>Reference Number<br />            
            <input type="text" name="ref" value="<?php echo $rowspost['ref']; ?>" /></td>
        </tr>
        <tr>
          <td>Item            
            <br />
            <textarea name="item" cols="35" rows="2"><?php echo $rowspost['item']; ?></textarea></td>
        </tr>
        <tr>
          <td>Origin<br />
            <input type="text" name="ori" value="<?php echo $rowspost['origin']; ?>" /></td>
        </tr>
        <tr>
          <td>Destination<br />
            <input type="text" name="desti" value="<?php echo $rowspost['desti']; ?>" /></td>
        </tr>
        <tr>
          <td>Receiver Full Name<br /> 
            <input type="text" name="rn" value="<?php echo $rowspost['rn']; ?>" /></td>
        </tr>
        <tr>
          <td>Receiver Address 
            <textarea name="ra" cols="35" rows="3"><?php echo $rowspost['ra']; ?></textarea></td>
        </tr>
        <tr>
          <td>Receiver Phone No. <br /> 
            <input type="text" name="rp" value="<?php echo $rowspost['rp']; ?>" /></td>
        </tr>
        <tr>
          <td><p>Date<br />
            <input type="text" name="date" value="<?php echo $rowspost['date']; ?>" />
            <br /><input type="hidden" name="trackid" value="<?php echo $trackid; ?>" />
          </td>
        </tr>
        <tr>
          <td><label>
            <input id="buttonnew" type="submit" name="Submit" value="Save" />
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
