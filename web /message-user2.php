<?php
require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
  $level=$_SESSION['level'];
 }

$toUserID = $_REQUEST['toUserID'];
$title =$_REQUEST['title'];
$message =$_REQUEST['message'];


$sql = "INSERT INTO `message` (`messageID` ,`fromUserID` ,`toUserID` ,`title` ,`body` ,`time` ) VALUES (NULL , $uid, $toUserID, '$title', '$message',CURRENT_TIMESTAMP);";

mysql_query($sql , $conn);

mysql_close($conn);

if($level == 3){
  header("Location: admin.php");
  //echo "header admin";
 }
 elseif($level == 2){
   header("Location: prof.php");
   //echo "header prof";
 }
 else{
   header("Location: student.php"); 
   //echo "header student";
 }
exit;


?>