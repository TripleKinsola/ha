<?php session_start();
$from='from ';
$empty=' ';
$subject='Message from the contact page on website';
$message='Request Type: '.$_POST['request'].' Message:'.$_POST['message'];
$mail_from=$_POST['name'];
$header=$from.$_POST['name'].$empty.$_POST['email'].$empty.$_POST['phone'];
$to='delivery@hamiltongs.com';
$verify_contact=mail($to,$subject,$message,$header,$mail_from);

if($verify_contact){
$_SESSION['sent']='yes';

header("location:contact.php");
}
else {
echo "ERROR, Your message was not sent, please go back and try again";
}
?>
