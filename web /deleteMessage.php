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

$messageID = $_REQUEST['messageID'];


//$sql = "INSERT INTO `administrationSecurity`.`message` (`messageID` ,`fromUserID` ,`toCourseID` ,`title` ,`body` ,`time` ) VALUES (NULL , $uid, $toCourseID, '$title', '$message',CURRENT_TIMESTAMP);";


$sql ="DELETE FROM `message` WHERE `message`.`messageID` = $messageID LIMIT 1";

mysql_query($sql , $conn);

mysql_close($conn);

  header("Location: viewMessages.php");

exit;


?>